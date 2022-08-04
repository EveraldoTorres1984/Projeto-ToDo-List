<?php 

class User {

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $token;

}

interface UserDAO{
    public function findByToken($token);
}