<?php
require 'config.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/signup.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <div class="box">
            <h2>Cadastro</h2>
            <form method="POST" action="<?= $base ?>/signup_action.php">

                <?php if (!empty($_SESSION['flash'])) : ?>
                    <?= $_SESSION['flash']; ?>
                    <?= $_SESSION['flash'] = ''; ?>
                <?php endif; ?>

                <div class="inputBox">
                    <input type="text" name="nome" maxlength="400" required />
                    <label for="">Nome</label>
                </div>
                <div class="inputBox">
                    <input type="email" name="email" maxlength="200" autocomplete="off" required />
                    <label for="">Email</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="senha" maxlength="200" required />
                    <label for="">Senha</label>

                    <button id="buttonLogin" type="submit" class="btn btn-primary">Entrar</button><br>

                    <a class="link" href="<?= $base; ?>/login.php">Já tem conta? Faça o Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/validacao.js"></script>
    <script src="assets/js/jquery.js"></script>
</body>

</html>