<?php

require './config.php';

require './models/Auth.php';


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = strtolower(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
$senha = filter_input(INPUT_POST, 'senha');


if ($nome && $email && $senha) {
    $auth = new Auth($conn, $base);
}

if ($auth->emailExists($email) === false) {

    $auth->registerUser($nome, $email, $senha);

    header("location: " . $base);
    exit;
} else {
    $_SESSION['flash'] = '<div class="alert alert-danger text-center" role="alert">
    Email já cadastrado! </div>';
    header("location: " . $base . "/login.php");
    exit;
}
