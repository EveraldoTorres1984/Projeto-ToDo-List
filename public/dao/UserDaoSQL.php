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

            if ("SELECT COUNT * FROM tasks_users" > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }

        return false;
    }
}
