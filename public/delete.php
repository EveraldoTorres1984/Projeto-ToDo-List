<?php

require './config.php';
require 'dao/TableDaoSQL.php';


$task = new TableDaoSQL($conn);

$idTask = filter_input(INPUT_GET, 'id_task');
$idUser = filter_input(INPUT_GET, 'id_user');

if ($idTask && $idUser) {
    
    $task->delete($idTask, $idUser);    
}

header("location: " . $base);
exit;
