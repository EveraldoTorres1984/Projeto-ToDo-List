<?php

require_once 'models/Table.php';

class tableDaoSQL implements tableDAO
{
    private $conn;

    public function __construct(PDO $driver)
    {
        $this->conn = $driver;
    }
    

    public function update(Table $t)
    {
        $sql = $this->conn->prepare("UPDATE tbl_tasks SET email =:email,
        senha = :senha, nome = :nome, token = :token WHERE id =:id");

        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':senha', $u->senha);
        $sql->bindValue(':nome', $u->nome);
        $sql->bindValue(':token', $u->token);
        $sql->bindValue(':id', $u->id);
        $sql->execute();

        return true;
    }

    public function insert(User $u)
    {
        $sql = $this->conn->prepare("INSERT INTO tasks_users(nome, email, senha,token) VALUES (:nome, :email, :senha,:token)");
        $sql->bindValue(':nome', $u->nome);
        $sql->bindValue(':email', $u->email);
        $sql->bindValue(':senha', $u->senha);
        $sql->bindValue(':token', $u->token);
        $sql->execute();
    }
}
