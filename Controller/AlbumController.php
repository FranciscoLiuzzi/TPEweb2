<?php
require_once "./Model/AlbumModel.php";
require_once "./View/AlbumView.php";
require_once "./helpers/AuthHelper.php";

class AlbumController{

    private $model;
    private $view;
    private $authhelper;

    function __construct(){
        $this->model = new AlbumModel();
        $this->view = new AlbumView();
        $this->authhelper = new AuthHelper();
    }

    function showAlbums(){
        $logged = $this->authhelper->checkLogin();
        $albums = $this->model->getAlbums();
        $this->view->displayAlbums($albums, $logged);
    }

    function showHome(){
        $logged = $this->authhelper->checkLogin();
        $recomendacion= $this->model->getRecomendacion();
        $this->view->displayHome($recomendacion, $logged);
    }


    function showAlbum($id){
        $logged = $this->authhelper->checkLogin();
        $album = $this->model->getAlbum($id);
        $this->view->showAlbum($album, $logged);
    }

    function showAlbumByArtist($id){
        $logged = $this->authhelper->checkLogin();
        $albums = $this->model->getAlbumsArtist($id);
        $this->view->displayAlbumsByArtist($albums, $logged);
    }
    
}