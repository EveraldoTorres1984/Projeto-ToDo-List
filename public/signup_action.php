<?php

require './config.php';

require './models/Auth.php';


$nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');


if ($nome && $email && $senha) {
    $auth = new Auth($conn, $base);
}

if ($auth->emailExists($email) === false) {
    
    $auth->registerUser($nome, $email, $senha);
    
    header("location: " . $base);
    exit;
} else {
    $_SESSION['flash'] = 'E-mail já Cadastrado';
    header("location: " . $base . "/login.php");
    exit;
}
