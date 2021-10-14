<?php

class abmModel{
    
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=127.0.0.1;'.'dbname=db_tpe;charset=utf8','root','');
    }

    function getAlbums(){
        $query = $this->db->prepare('SELECT * FROM album');
        $query->execute();

        $artists = $query->fetchAll(PDO::FETCH_OBJ);

        return $artists;
    }

    function editAlbum($id_album,$album,$image,$anio,$score,$artist){
        $query = $this->db->prepare("UPDATE album SET id_album = ?,album_name = ?,album_img = ?,anio = ?,score = ?,n_artist = ? WHERE id_album = ?");
        $query->execute(array($id_album,$album,$image,$anio,$score,$artist,$id_album));
        
    }

    function editArtist($id_artist,$artist,$genre,$artist_img){
        $query = $this->db->prepare("UPDATE artist SET id_artist = ?, artist = ?, genre = ?, artist_img = ? WHERE id_artist = ?");
        $query->execute(array($id_artist,$artist,$genre,$artist_img,$id_artist));
    }

    function insertAlbum($album,$img,$year,$score,$id_artist) {
        $query = $this->db->prepare("INSERT INTO album(id_album,album_name,album_img,anio,score,n_artist) VALUES (NULL,?,?,?,?,?)");
        $query->execute(array($album,$img,$year,$score,$id_artist));
    }

    function getArtists(){
        $query = $this->db->prepare('SELECT * FROM artist');
        $query->execute();

        $artists = $query->fetchAll(PDO::FETCH_OBJ);

        return $artists;
    }

    function dropAlbum($id){
        $query = $this->db->prepare('DELETE FROM album WHERE id_album = ?');
        $query->execute(array($id));
    }

    function dropArtist($id){
        $query = $this->db->prepare('DELETE FROM artist WHERE id_artist = ?');
        $query->execute(array($id));
    }

    function insertArtist($artist,$genre,$img){
        $query = $this->db->prepare("INSERT INTO artist(id_artist,artist,genre,artist_img) VALUES (NULL,?,?,?)");
        $query->execute(array($artist,$genre,$img));
    }
}