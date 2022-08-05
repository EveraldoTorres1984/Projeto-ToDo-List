<?php

require 'config.php';
require 'models/Auth.php';


$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');

echo $email. '---'.$senha;

if ($email && $senha) {
    $auth = new Auth($conn, $base);
    if ($auth->validateLogin($email, $senha)) {
        header("location: " . $base);
    }
}


$_SESSION['flash'] = 'E-mail e/ou senha inválidos. 2';
header("location: " . $base . "/login.php");
exit;
