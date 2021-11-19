<?php
require_once "./Model/ArtistModel.php";
require_once "./View/ArtistView.php";
require_once "./helpers/AuthHelper.php";
require_once "./View/UserView.php";

class ArtistController{

    private $model;
    private $view;
    private $authhelper;

    function __construct(){
        $this->model = new ArtistModel();
        $this->view = new ArtistView();
        $this->view_user = new UserView();
        $this->authhelper = new AuthHelper();
    }

    function showArtists(){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        $artists = $this->model->getArtists();
        $this->view->viewArtists($artists, $admin, $logged);
    }

    function editArtist(){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        if($logged == true){
            if($admin == true){
                //validar que llegue algo
                $this->model->editArtist($_POST['id_artist'],$_POST['artist'],$_POST['genre'],$_POST['artist_img']);
                //$this->view->showAddArtistLocation(); 
            }else{
                $this->view_user->showLoginLocation();
            }
            
        }else{
            $this->view_user->showLoginLocation();
        }
    }

    function createArtist(){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        if($logged == true){
            if($admin == true){
                try{
                    //validar que llegue algo
                    $this->model->insertArtist($_POST['artist'],$_POST['genre'],$_POST['image']);
                    //$this->view->showAddArtistLocation();   
                }catch( PDOEXception $e ) {
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

    function deleteArtist($id){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        if($logged == true){
            if($admin == true){
                //validar que exista 
                $this->model->dropArtist($id);
                $this->view->showArtistsLocation();
            }else{
                $this->view_user->showLoginLocation();
            }
        }else{
            $this->view_user->showLoginLocation();
        }
    }
}
