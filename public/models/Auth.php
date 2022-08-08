<?php

require_once 'dao/UserDaoSQL.php';

class Auth
{
    private $conn;
    private $dao;


    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
        $this->dao = new UserDaoSQL($this->conn);
    }

    public function checkToken()
    {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            
            $user = $this->dao->findByToken($token);
            if ($user) {
                return $user;
            }
        }

        header("location:" . $this->base . "login.php");
        exit;
    }

    public function validateLogin($email, $senha)
    {
        
        $user = $this->dao->findByEmail($email);
        if ($user) {
            if (password_verify($senha, $user->senha)) {
                $token = md5(time() . rand(0, 9999));
                $_SESSION['token'] = $token;
                $this->dao->update($user);

                return true;
            }
        }

        return false;
    }

    public function emailExists($email)
    {        
               
        return $this->dao->findByEmail($email) ? true : false;
        
    }

    public function registerUser($nome, $email, $senha){       
        

        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $token = md5(time() . rand(0, 9999));

        $newUser = new User();
        $newUser->nome = $nome;
        $newUser->email = $email;
        $newUser->senha = $hash;
        $newUser->token = $token;

        $this->dao->insert($newUser);

        $_SESSION['token'] = $token;
    }
}
