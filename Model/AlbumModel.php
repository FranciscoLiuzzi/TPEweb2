<?php

class AlbumModel{
    
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=127.0.0.1;'.'dbname=db_tpe;charset=utf8','root','');
    }

    function getAlbums(){
        $query = $this->db->prepare('SELECT * FROM album AS a INNER JOIN artist AS b ON a.n_artist = b.id_artist');
        $query->execute();

        $albums = $query->fetchAll(PDO::FETCH_OBJ);

        return $albums;
    }

    function getAlbum($id){
        
        $query = $this->db->prepare('SELECT * FROM album AS a INNER JOIN artist AS b ON a.n_artist = b.id_artist WHERE id_album = ?');
        $query->execute(array($id));

        $album = $query->fetch(PDO::FETCH_OBJ);

        return $album;
    }

    function getRecomendacion(){
        $query = $this->db->prepare('SELECT * FROM album AS a INNER JOIN artist AS b ON a.n_artist = b.id_artist WHERE artist = "Kanye West"');
        $query->execute();

        $recomendacion = $query->fetchAll(PDO::FETCH_OBJ);

        return $recomendacion;
    }

    function getAlbumsArtist($id){
        $query = $this->db->prepare('SELECT * FROM album AS a INNER JOIN artist AS b ON a.n_artist = b.id_artist WHERE id_artist= ?');
        $query->execute(array($id));

        $album = $query->fetchAll(PDO::FETCH_OBJ);

        return $album;
    }

    function editAlbum($id_album,$album,$image,$anio,$score,$artist){
        $query = $this->db->prepare("UPDATE album SET id_album = ?,album_name = ?,album_img = ?,anio = ?,score = ?,n_artist = ? WHERE id_album = ?");
        $query->execute(array($id_album,$album,$image,$anio,$score,$artist,$id_album));
        
    }

    function insertAlbum($album,$img,$year,$score,$id_artist) {
        $query = $this->db->prepare("INSERT INTO album(id_album,album_name,album_img,anio,score,n_artist) VALUES (NULL,?,?,?,?,?)");
        $query->execute(array($album,$img,$year,$score,$id_artist));
    }

    function dropAlbum($id){
        $query = $this->db->prepare('DELETE FROM album WHERE id_album = ?');
        $query->execute(array($id));
    }
}