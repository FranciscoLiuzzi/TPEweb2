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

    /*function getArtists($id){
        $query = $this->db->prepare('SELECT artist FROM artists WHERE artist = ?');
        $query->execute();

        $artist = $query->fetchAll(PDO::FETCH_OBJ);

        return $artist;
    }*/

    function insertArtist($artist, $genre){

        $query = $this->db->prepare("INSERT INTO artist(artist,genre) VALUES (?,?)");
        $query->execute(array($artist, $genre));
    }
}