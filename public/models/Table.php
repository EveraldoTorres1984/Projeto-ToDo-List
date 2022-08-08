<?php 

class Table {

    public $id;
    public $tarefa;
    public $dataCriacao;
    
}

interface tableDAO{
    
    public function update(Table $t);
}