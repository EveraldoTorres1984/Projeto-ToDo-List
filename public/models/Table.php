<?php

class Table
{
    public $id_task;
    public $desc_task;
    public $date_task;
    public $id_user;
}

interface TableDAO
{
    
    public function insert(Table $t);
}
