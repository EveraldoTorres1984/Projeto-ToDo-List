<?php
require 'config.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/login.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <div class="container">

        <div class="box">
            <h2>Login</h2>
            <form method="POST" action="<?= $base ?>/login_action.php" class="validator">

                <div class="inputBox">
                    <input class="inputEmail" type="email" name="email" data-rules="required" autocomplete="off" />
                    <label for="">Email</label>
                </div>
                <div class="inputBox">
                    <input class="inputSenha" type="password" name="senha" data-rules="required" />
                    <label for="">Senha</label>
                </div>
                <div id="btn-link">
                    <button id="buttonLogin" type="submit" class="btn btn-primary">Entrar</button><br>

                    <a class="link" href="<?= $base; ?>/signup.php">Ainda não tem conta? Cadastre-se</a>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/validacao.js"></script>
    <script src="assets/js/jquery.js"></script>
</body>

</html>