<?php

class ArtistModel{
        
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=127.0.0.1;'.'dbname=db_tpe;charset=utf8','root','');
    }

    function getArtists(){
        $query = $this->db->prepare('SELECT * FROM artist');
        $query->execute();

        $artists = $query->fetchAll(PDO::FETCH_OBJ);

        return $artists;
    }

    function insertArtist($artist, $genre){

        $query = $this->db->prepare("INSERT INTO artist(artist,genre) VALUES (?,?)");
        $query->execute(array($artist, $genre));
    }

    function editArtist($id_artist,$artist,$genre,$artist_img){
        $query = $this->db->prepare("UPDATE artist SET id_artist = ?, artist = ?, genre = ?, artist_img = ? WHERE id_artist = ?");
        $query->execute(array($id_artist,$artist,$genre,$artist_img,$id_artist));
    }

    function dropArtist($id){
        $query = $this->db->prepare('DELETE FROM artist WHERE id_artist = ?');
        $query->execute(array($id));
    }

    
}