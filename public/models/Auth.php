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

        header("location:" . $this->base . "login.php");
        exit;
    }

    public function validateLogin($email, $senha)
    {
        $userDao = new UserDaoSQL($this->conn);
        $user = $userDao->findByEmail($email);
        if ($user) {
            if (password_verify($senha, $user->senha)) {
                $token = md5(time() . rand(0, 9999));
                $_SESSION['token'] = $token;
                $userDao->update($user);

                return true;
            }
        }

        return false;
    }

    public function emailExists($email)
    {
        
        $userDao = new UserDaoSQL($this->conn);
        
        return $userDao->findByEmail($email) ? true : false;
        
    }

    public function registerUser($nome, $email, $senha){
        $userDao = new UserDaoSQL($this->conn);
        

        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $token = md5(time() . rand(0, 9999));

        $newUser = new User();
        $newUser->nome = $nome;
        $newUser->email = $email;
        $newUser->senha = $hash;
        $newUser->token = $token;

        $userDao->insert($newUser);

        $_SESSION['token'] = $token;
    }
}
