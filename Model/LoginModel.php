<?php

class LoginModel{
    
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=127.0.0.1;'.'dbname=db_tpe;charset=utf8','root','');
    }

    function getUsername($user){
        $query = $this->db->prepare('SELECT * FROM user WHERE user = ?');
        $query->execute(array($user));

        $data = $query->fetch(PDO::FETCH_OBJ);

        return $data;
    }

    function newUser($mail, $password){
        $query = $this->db->prepare('INSERT INTO users (email, password) VALUES (? , ?)');
        $query->execute();
    }
}