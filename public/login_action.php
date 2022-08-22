<?php

require './config.php';
require './models/Auth.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
 
if ($email && $senha) {
    $auth = new Auth($conn, $base);
    if ($auth->validateLogin($email, $senha)) {
       
        header("location: " . $base);        
        exit;
    }
}

$_SESSION['flash'] = '<div class="alert alert-danger div-alert text-center" role="alert"> Email e/ou Senha não cadastrado(s). </div>';
header("location: " . $base . "/login.php");
exit;
