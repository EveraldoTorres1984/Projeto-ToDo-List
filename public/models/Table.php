<?php

date_default_timezone_set('America/Sao_Paulo');

class Table
{
    public $id_task;
    public $desc_task;
    public $date_task;
    public $id_user;
    

    public function getIdTask()
    {
        return $this->id_task;
    }

    public function setIdTask($i)
    {
        $this->id_task = trim($i);
    }

    public function getDescTask()
    {
        return $this->desc_task;
    }

    public function setDescTask($desc_task)
    {
        $this->desc_task = $desc_task;
    }

    public function getDateTask()
    {
        $date = DateTime::createFromFormat('d/m/Y', $this->date_task);
        var_dump($date);
        exit;
        return $date;
    }
    public function setDateTask($date_task)
    {
        $this->date_task = date('d/m/Y');
    }
    public function getIdUser()
    {
        return $this->id_user;
    }
    public function setIdUser($iu){
        $this->id_user =trim($iu);
    }
}

interface TableDAO
{

    public function insert(Table $t);
    public function getListInfo(Table $t);
    public function delete($id_task, $id_user);
}
