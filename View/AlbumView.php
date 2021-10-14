<?php
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class AlbumView{

    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }
    
    function displayAlbums($albums, $logged){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('albums', $albums);
        $this->smarty->display('templates/albums.tpl');
        
    }
    function showHomeLocation(){
        header("Location:".BASE_URL."home");
    }

    function showAlbum($album, $logged){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('album', $album);
        $this->smarty->display('templates/album.tpl');
        
    }
    function displayHome($recomendacion, $logged){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('recomendacion', $recomendacion);
        $this->smarty->display('templates/home.tpl');
    }

    function displayAlbumsByArtist($albums, $logged){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('albums', $albums);
        $this->smarty->display('templates/albumbyartist.tpl');
    }
}