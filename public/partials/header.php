<?php
$firstName = current(explode(' ', $userInfo->nome));
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../assets/images/task-br.ico" type="image/x-icon">
    <title>Lista de Tarefas</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<header>
    <div class="container">
        <div class="head-side">
            <div class="head-side-left">
                <div class="search-area">
                    <form method="GET">
                        <input type="text" id="filtro" placeholder="Buscar na tabela" />
                    </form>
                </div>
            </div>
            <div class="head-center">
                <h2>Seja bem-vindo(a), <?= ucfirst($firstName); ?></h2>
            </div>
            <div class="head-side-right">
                <a href="<?= $base; ?>/logout.php" class="user-logout">Sair
                    <img src="<?= $base; ?>/assets/images/power_off.png" />
                </a>
            </div>
        </div>
    </div>
</header>