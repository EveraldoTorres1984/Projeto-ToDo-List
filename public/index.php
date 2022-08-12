<?php

require 'config.php';
require 'models/Auth.php';
require 'dao/TableDaoSQL.php';

$firstName = current(explode(' ', $userInfo->nome));

$auth = new Auth($conn, $base);
$userInfo = $auth->checkToken();
$taskDAO = new TableDaoSQL($conn);

$tarefas = $taskDAO->getListInfo($userInfo->id);


require 'partials/header.php';


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1" />
    <link rel="stylesheet" href="assets/css/body.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container">
        <form class="novaTarefa" action="<?= $base; ?>/table_action.php" method="POST">
            <div class="container">
                <div class="row justify-content-center m-auto shadow bg-transparent mt-3 py-3 col-md-6 mt-5">
                    <div class="col-8">
                        <input type="text" name="tarefa" class="form-control" id="inserirTarefa" placeholder="Insira suas tarefas aqui, <?= $firstName ?>">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" type="submit">Adicionar</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped mt-5">
                    <thead id="center-thead"">
                        <tr>
                        <th scope=" col" class="table-primary fs-4">ID</th>
                        <th scope="col" class="table-primary fs-4">Tarefa</th>
                        <th scope="col" class="table-primary fs-4">Criada em</th>
                        <th scope="col" class="table-primary fs-4">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($tarefas as $tarefa) : ?>
                            <tr>
                                <td><?= $tarefa->getIdTask(); ?></td>
                                <td><?= $tarefa->getDescTask(); ?></td>
                                <td><?= $tarefa->getDateTask(); ?></td>
                                <td class="col-md-4">
                                    <div id="btn-acao">
                                        <button class=" btn btn-warning">Editar</button>
                                        <a href="delete.php?id_task=<?= $tarefa->getIdTask() . '&id_user=' . $tarefa->getIdUser(); ?>" class=" btn btn-danger" onclick="confirm('Tem certeza que deseja apagar esta tarefa?')">Apagar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>

</html>