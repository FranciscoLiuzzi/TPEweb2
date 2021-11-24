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
                if(!empty($_POST['id_artist']) && !empty($_POST['artist']) && !empty($_POST['genre']) && !empty($_POST['artist_img'])){
                    $this->model->editArtist($_POST['id_artist'],$_POST['artist'],$_POST['genre'],$_POST['artist_img']);
                    $this->view_user->showSucces($logged, "Artista editado!");
                }else{
                    $this->view_user->showError($logged,"Error: Faltan llenar campos!");
                }
            }else{
                $this->view_user->showError($logged,"No tenes permisos");
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
                //validar que llegue algo
                if(!empty($_POST['artist']) && !empty($_POST['genre']) && !empty($_POST['image'])){
                    $id = $this->model->insertArtist($_POST['artist'],$_POST['genre'],$_POST['image']);
                    if($id != 0){
                        $this->view_user->showSucces($logged, "Artista creado!"); 
                    }else{
                        $this->view_user->showError($logged, "Error: El artista no fue creado!");
                    }
                }else{
                    $this->view_user->showError($logged,"Error: Faltan llenar campos!");
                }
            }else{
                $this->view_user->showError($logged,"No tenes permisos");
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
                try{
                    $artist = $this->model->getArtist($id);
                    if($artist){
                        $this->model->dropArtist($id);
                        $this->view->showArtistsLocation();
                    }else{
                        $this->view_user->showError($logged,"No existe el artista");
                    }
                }catch(Exception $e){
                    $this->view_user->showError($logged,"El artista no debe tener albums cargados");
                }
            }else{
                $this->view_user->showError($logged,"No tenes permisos");
            }
        }else{
            $this->view_user->showLoginLocation();
        }
    }
}
