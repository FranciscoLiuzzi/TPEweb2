<?php
require_once "./View/abmView.php";
require_once "./Model/abmModel.php";


class abmController{

    private $model;
    private $view;
    private $authhelper;

    function __construct(){
        $this->model = new abmModel();
        $this->view = new abmView();
        $this->authhelper = new AuthHelper();
    }

    function editAlbum(){
        $logged = $this->authhelper->checkLogin();
        if($logged == true){
            $this->model->editAlbum($_POST['id_album'],$_POST['album'],$_POST['image'],$_POST['anio'],$_POST['score'],$_POST['artist']);
            $this->view->showAddAlbumLocation();
        }else{
            $this->view->showLoginLocation();
        }
    }

    function editArtist(){
        $logged = $this->authhelper->checkLogin();
        if($logged == true){
            $this->model->editArtist($_POST['id_artist'],$_POST['artist'],$_POST['genre'],$_POST['artist_img']);
            $this->view->showAddArtistLocation();
        }else{
            $this->view->showLoginLocation();
        }
    }
        
    function deleteAlbum($id){
        $logged = $this->authhelper->checkLogin();
        if($logged == true){
            $this->model->dropAlbum($id);
            $this->view->showAlbumsLocation();
        }else{
            $this->view->showLoginLocation();
        }
    }

    function deleteArtist($id){
        $logged = $this->authhelper->checkLogin();
        if($logged == true){
            $this->model->dropArtist($id);
            $this->view->showArtistsLocation();
        }else{
            $this->view->showLoginLocation();
        }
    }

    function showAddAlbum(){
        $albums = $this->model->getAlbums();
        $logged = $this->authhelper->checkLogin();
        $artists = $this->model->getArtists();
        if($logged == true){
            $this->view->displayAbm($logged,$artists,$albums);
            
        }else{
            $this->view->showLoginLocation();
        }
    }

    function showAddArtist(){
        $artists = $this->model->getArtists();
        $logged = $this->authhelper->checkLogin();
        if($logged == true){
            $this->view->displayAddArtist($logged, $artists);
            
        }else{
            $this->view->showLoginLocation();
        }
    }


    function createArtist(){
        $logged = $this->authhelper->checkLogin();
        if($logged == true){
          try{
            $this->model->insertArtist($_POST['artist'],$_POST['genre'],$_POST['image']);
            $this->view->showAddArtistLocation();   
            } catch( PDOEXception $e ) {
                echo $e->getMessage(); // display error
                exit();       
                }  
        }else{
            $this->view->showLoginLocation();
        }
        
    }

    function createAlbum(){
        $logged = $this->authhelper->checkLogin();
        if($logged == true){
            try{
                $this->model->insertAlbum($_POST['album'],$_POST['image'],$_POST['anio'],$_POST['score'],$_POST['artist']);
                $this->view->showAddAlbumLocation();
            } catch( PDOEXception $e ) {
                echo $e->getMessage(); // display error
                exit();       
            }
        }else{
            $this->view->showLoginLocation();
        }
    }     
}