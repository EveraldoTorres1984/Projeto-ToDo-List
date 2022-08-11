<?php 

require './config.php';
require 'dao/TableDaoSQL.php';


$task = new TableDaoSQL($conn);

$id = filter_input(INPUT_GET, 'id_task');

if($id){
    $TableDaoSQL->delete($id);
}