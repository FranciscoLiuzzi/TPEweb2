<?php

class CommentModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=127.0.0.1;'.'dbname=db_tpe;charset=utf8','root','');
    }

    function getComments($id){
        $query = $this->db->prepare("SELECT a.id, a.id_album, a.comment, a.score, b.user FROM comment AS a INNER JOIN user AS b ON a.id_user = b.id_user WHERE id_album = ?");
        $query->execute(array($id));
        
        $comments = $query->fetchAll(PDO::FETCH_OBJ);

        return $comments;
    }

    function getCommentsPuntaje($id,$puntaje){
        $query = $this->db->prepare("SELECT a.id, a.id_album, a.comment, a.score, b.user FROM comment AS a INNER JOIN user AS b ON a.id_user = b.id_user WHERE id_album = ? AND score = ?");
        $query->execute(array($id,$puntaje));
        
        $comments = $query->fetchAll(PDO::FETCH_OBJ);

        return $comments;
    }

    function getComment($id){
        $query = $this->db->prepare("SELECT * FROM comment WHERE id = ?");
        $query->execute(array($id));
        
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function newComment($id_user,$id_album,$comment,$score){
        $query = $this->db->prepare("INSERT INTO comment(id_user,id_album,comment,score) VALUES(?,?,?,?)");
        $query->execute(array($id_user,$id_album,$comment,$score));

        return $this->db->lastInsertId();
    }

    function dropComment($id){
        $query = $this->db->prepare("DELETE FROM comment WHERE id = ?");
        $query->execute(array($id));

        
    }
}