<?php

require_once '../models/Table.php';

class tableDaoSQL implements tableDAO
{
    private $conn;

    public function __construct(PDO $driver)
    {
        $this->conn = $driver;
    }
    

    public function update(Table $t)
    {
        $sql = $this->conn->prepare("UPDATE tbl_tasks SET date_task = :date_task,desc_task = :desc_task WHERE id_task =:id");

        $sql->bindValue(':date_task', $t->dataCriacao);
        $sql->bindValue(':desc_task', $t->tarefa);       
        $sql->bindValue(':id', $t->id);
        $sql->execute();

        return true;
    }

    public function insert(Table $t)
    {
        $sql = $this->conn->prepare("INSERT INTO tbl_tasks(desc_task, date_task, id_user) VALUES (desc_task, date_task, id_user)");
        $sql->bindValue(':desc_task', $t->tarefa);
        $sql->bindValue(':date_task', $t->email);
        $sql->bindValue(':id_user', $t->idUser);        
        $sql->execute();
    }
}
