<?php

require_once 'dao/UserDaoSQL.php';

class Auth
{
    private $conn;
 

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
     
    }

    public function checkToken()
    {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $userDao = new UserDaoSQL($this->conn);
            $user = $userDao->findByToken($token);
            if ($user) {
                return $user;
            }
        }

        header("location:" . $this->base . "/login.php");
        exit;
    }

    public function validateLogin($email, $senha){

    }
}
