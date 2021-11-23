<?php
require_once "./Model/AlbumModel.php";
require_once "./View/AlbumView.php";
require_once "./helpers/AuthHelper.php";
require_once "./View/UserView.php";

class AlbumController{

    private $model;
    private $view;
    private $authhelper;

    function __construct(){
        $this->model = new AlbumModel();
        $this->view = new AlbumView();
        $this->view_user = new UserView();
        $this->authhelper = new AuthHelper();
    }

    function showAlbums(){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        $albums = $this->model->getAlbums();
        $this->view->displayAlbums($albums, $admin, $logged);
    }

    function showHome(){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        $recomendacion= $this->model->getRecomendacion();
        $this->view->displayHome($recomendacion, $admin, $logged);
    }


    function showAlbum($id){
        $logged = $this->authhelper->checkLogin();
        $user = json_decode(json_encode($_SESSION));
        $admin = $this->authhelper->checkAdmin();
        $album = $this->model->getAlbum($id);
        $this->view->showAlbum($album, $admin, $logged, $user);
    }

    function showAlbumByArtist($id){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        $albums = $this->model->getAlbumsArtist($id);
        $this->view->displayAlbumsByArtist($albums, $admin, $logged);
    }

    function editAlbum(){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        if($logged == true){
            if($admin == true){
                //agregar validacion de si llega
                $this->model->editAlbum($_POST['id_album'],$_POST['album'],$_POST['image'],$_POST['anio'],$_POST['score'],$_POST['artist']);
                $this->view_user->showSucces($logged,"Album editado!");
            }else{
                $this->view_user->showError($logged,"No tenes permisos gato!");
            }
        }else{
            $this->view_user->showLoginLocation();
        }
    }
        
    function deleteAlbum($id){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        if($logged == true){
            if($admin == true){
                //validar que el album exista
                $this->model->dropAlbum($id);
                $this->view->showAlbumsLocation();
            }else{
                $this->view_user->showLoginLocation();
            }
        }else{
            $this->view_user->showLoginLocation();
        }
    }

    function createAlbum(){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        if($logged == true){
            if($admin == true){
                try{
                    //validar si llega algo
                    $this->model->insertAlbum($_POST['album'],$_POST['image'],$_POST['anio'],$_POST['score'],$_POST['artist']);
                    $this->view_user->showSucces($logged,"Album creado!");
                } catch( PDOEXception $e ) {
                    echo $e->getMessage(); // display error
                    exit();       
                }
            }else{
                $this->view_user->showLoginLocation();
            }
        }else{
            $this->view_user->showLoginLocation();
        }
    } 
    
}