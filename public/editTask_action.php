<?php
require 'config.php';
require 'dao/TableDaoSQL.php';

$taskDao = new TableDaoSQL($conn);

$id_task = filter_input(INPUT_POST, 'id_task');
$desc_task = filter_input(INPUT_POST, 'desc_task');

if ($id_task && $desc_task) {
    $tarefa = new Table();
    $tarefa->setIdTask($id_task);
    $tarefa->setDescTask($desc_task);
    $taskDao->update($tarefa);

    header("Location: " . $base);
} else {
    header("Location: " . $base . "/editTask.php");
    exit;
}
