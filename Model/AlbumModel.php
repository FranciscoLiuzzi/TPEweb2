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

    function getAlbumsPag($lim,$off){
        $query = $this->db->prepare('SELECT * FROM album AS a INNER JOIN artist AS b ON a.n_artist = b.id_artist LIMIT :limit OFFSET :offset');
        $query->bindParam(":limit",$lim, PDO::PARAM_INT);
        $query->bindParam(":offset",$off, PDO::PARAM_INT);
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
        
        return $this->db->lastInsertId();
    }

    function insertAlbum($album,$img,$year,$score,$id_artist) {
       /* $pathImg = null;

        if($img){
            $pathImg = $this->uploadImage($img);
        }*/
        $query = $this->db->prepare("INSERT INTO album(id_album,album_name,album_img,anio,score,n_artist) VALUES (NULL,?,?,?,?,?)");
        $query->execute(array($album,$img,$year,$score,$id_artist));

        return $this->db->lastInsertId();
    }

    /*private function uploadImage($image){
        $filePath = "img/albums/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['input_name']['name'], PATHINFO_EXTENSION));
        move_uploaded_file($image, $target);
        return $target;
    }*/


    function dropAlbum($id){
        $query = $this->db->prepare('DELETE FROM album WHERE id_album = ?');
        $query->execute(array($id));
    }

   function calcItems(){
        $query = $this->db->prepare('SELECT count(id_album) AS id FROM album');
        $query->execute();
        $num = $query->fetch(PDO::FETCH_OBJ);

        return $num;
    }
}