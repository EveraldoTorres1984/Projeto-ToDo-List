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
                        <input type="text" name="tarefa" class="form-control" id="inserirTarefa" maxlength="50" placeholder="Insira suas tarefas aqui, <?= ucfirst($firstName) ?>">
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
                        <!-- <th scope=" col" class="table-primary fs-4">ID</th> -->
                        <th scope="col" class="table-primary fs-4">Tarefa</th>
                        <th scope="col" class="table-primary fs-4">Criada em</th>
                        <th scope="col" class="table-primary fs-4">Ações</th>
                        </tr>
                    </thead>

                    <tbody id="bodyTable">
                        <?php foreach ($tarefas as $tarefa) : ?>

                            <tr>
                                <!-- <td><?= $tarefa->getIdTask(); ?></td> -->
                                <td><?= $tarefa->getDescTask(); ?></td>
                                <td><?= $tarefa->getDateTask(); ?></td>
                                <td class="col-md-4 btn-acao">
                                    <div>

                                        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever-id="<?= $tarefa->getIdTask(); ?>" data-bs-whatever-desc="<?= $tarefa->getDescTask(); ?>">Editar</a>

                                        <a href="delete.php?id_task=<?= $tarefa->getIdTask() . '&id_user=' . $tarefa->getIdUser(); ?>" class=" btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar esta tarefa?')">Apagar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= $base; ?>/editTask_action.php">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Editar Tarefa:</label>

                            <input type="text" class="form-control" id="recipient-name" name="desc_task">

                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label"></label>

                            <input type="hidden" class="form-control hiddenId" id="recipient-name" name="id_task">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    require 'partials/footer.php'
    ?>