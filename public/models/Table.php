<?php

class Table {

    public $id;
    public $tarefa;
    public $dataCriacao;
    public $idUser;
}

interface tableDAO{
    public function insert(Table $t);
    public function update(Table $t);
}