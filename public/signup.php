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
</head>

<body>
    <div class="container">
        <div class="box">
            <h2>Cadastro</h2>
            <form method="POST" action="<?= $base ?>/signup_action.php" class="validator">

                <?php if (!empty($_SESSION['flash'])) : ?>
                    <?= $_SESSION['flash']; ?>
                    <?= $_SESSION['flash'] = ''; ?>
                <?php endif; ?>

                <div class="inputBox">
                    <label for="">Nome</label>
                    <input type="text" name="nome" maxlength="400" data-rules="required|min=2" />
                </div>
                <div class="inputBox">
                    <label for="">Email</label>
                    <input type="text" name="email" maxlength="200" autocomplete="off" data-rules="required|email" />
                </div>
                <div class="inputBox">
                    <label for="">Senha</label>
                    <input type="password" name="senha" maxlength="200" data-rules="required|min=3" />

                </div>
                <div id="btn-link">
                    <button type="submit" class="btn btn-primary buttonLogin">Cadastrar</button><br>

                    <a class="link" href="<?= $base; ?>/login.php">Já tem conta? Faça o Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/validacao.js"></script>
    <script src="assets/js/jquery.js"></script>
</body>

</html>