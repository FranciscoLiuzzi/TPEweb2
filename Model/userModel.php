<?php

class UserModel{
    
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

    function insertUser($user,$password,$mail){
        $query = $this->db->prepare('INSERT INTO user(role,user,email,password) VALUES ("usuario",?,?,?)');
        $query->execute(array($user,$mail,$password));
    }

    function dropUser($id){
        $query = $this->db->prepare('DELETE FROM user WHERE id_user = ?');
        $query->execute(array($id));
    }

    function setAdmin($id) {
        $query = $this->db->prepare('UPDATE user SET role = "admin" WHERE id_user = ?');
        $query->execute(array($id));
    }

    function dropAdmin($id) {
        $query = $this->db->prepare('UPDATE user SET role = "usuario" WHERE id_user = ?');
        $query->execute(array($id));
    }

    function getUsers(){
        $query = $this->db->prepare('SELECT id_user,role,user FROM user');
        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_OBJ);

        return $users;
    }
}