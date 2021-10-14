<?php
require_once "./Model/ArtistModel.php";
require_once "./View/ArtistView.php";
require_once "./helpers/AuthHelper.php";

class ArtistController{

    private $model;
    private $view;
    private $authhelper;

    function __construct(){
        $this->model = new ArtistModel();
        $this->view = new ArtistView();
        $this->authhelper = new AuthHelper();
    }

    function showArtists(){
        $logged = $this->authhelper->checkLogin();
        $artists = $this->model->getArtists();
        $this->view->viewArtists($artists, $logged);
    }

    /*function showArtist($id){
        $artist = $this->model->getArtist($id);
        $this->view->showArtistAlbums($artist);
    }*/

    
}
