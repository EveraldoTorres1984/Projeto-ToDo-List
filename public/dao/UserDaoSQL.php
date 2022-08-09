<?php

require_once 'models/User.php';

class UserDaoSQL implements UserDAO
{
    private $conn;

    public function __construct(PDO $driver)
    {
        $this->conn = $driver;
    }

    private function generateUser($array)
    {

        $u = new User();
        $u->id = $array['id'] ?? 0;
        $u->nome = $array['nome'] ?? '';
        $u->email = $array['email'] ?? '';
        $u->senha = $array['senha'] ?? '';
        $u->token = $array['token'] ?? '';

        return $u;
    }

    public function findByToken($token)
    {
        if (!empty($token)) {
            $sql = $this->conn->prepare("SELECT * FROM tasks_users WHERE token = :token");
            $sql->bindValue(':token', $token);
            $sql->execute();

            $qtde = $this->conn->prepare("SELECT COUNT(*) FROM tasks_users");
            $qtde->fetchAll(PDO::FETCH_ASSOC);
            $qtde->execute();

            if ($qtde->fetchAll(PDO::FETCH_ASSOC) > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }

        return false;
    }

    public function findByEmail($email)
    {

        if (!empty($email)) {
            $sql = $this->conn->prepare("SELECT * FROM tasks_users WHERE email = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();


            $qtde = $this->conn->prepare("SELECT COUNT(*) FROM tasks_users WHERE email = :email");
            $qtde->bindValue(':email', $email);
            $qtde->execute();

            if ($qtde->fetchColumn() > 0) {

                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }

        return false;
    }

    public function update(User $u)
    {
        var_dump($u);
        $sql = $this->conn->prepare("UPDATE tasks_users SET email =:email,
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
