<?php

/* require './dao/tableDaoSQL.php'; */
require './config.php';
require './models/Table.php';



var_dump('cxd');
exit;
$tableDao = new tableDaoSQL($conn);
$tableDao->tarefa = filter_input(INPUT_POST, 'tarefa');
$tableDao->dataCriacao = date('d/m/Y');
$tableDao->idUser = $auth->checkToken()->id;

$tableDao->insert($table);
