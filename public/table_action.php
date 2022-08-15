<?php

require 'config.php';
require 'models/Auth.php';
require 'dao/TableDaoSQL.php';

$auth = new Auth($conn, $base);
$userInfo = $auth->checkToken();

$tarefa =  ucfirst(trim(filter_input(INPUT_POST, 'tarefa')));

if ($tarefa) {
    $tarefaDao = new TableDaoSQL($conn);

    $newTarefa = new Table();
    $newTarefa->id_user = $userInfo->id;
    $newTarefa->date_task = date('Y-m-d');
    $newTarefa->desc_task = $tarefa;
    $tarefaDao->insert($newTarefa);
}

header("location: " . $base);
exit;
