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

    /*function showAlbums(){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        $albums = $this->model->getAlbums();
        $this->view->displayAlbums($albums, $admin, $logged);
    }*/

    function pagination(){
        $limit = 9;
        $items = $this->model->calcItems();
        $nItems = $items->id;
        $nPags = ceil($nItems / $limit);

        return $nPags;
    }

    function showAlbumsN($pag = null){
        if ($pag == null){
            $pag = 1;
        }
        $limit = 9;
        $offset = ($pag - 1) * $limit;
        $pags = $this->pagination();
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        $albums = $this->model->getAlbumsPag($limit,$offset);
        $this->view->displayAlbums($albums, $admin, $logged,$pags);
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
        if($album){
            $this->view->showAlbum($album, $admin, $logged, $user);
        }else{
            $this->view_user->showError($logged,"No existe el album");
        }
    }

    function showAlbumByArtist($id){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        $albums = $this->model->getAlbumsArtist($id);
        if($albums){
            $this->view->displayAlbumsByArtist($albums, $admin, $logged);
        }else{
            $this->view_user->showError($logged,"No existe el artista");
        }
    }

    function editAlbum(){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        if($logged == true){
            if($admin == true){
                //agregar validacion de si llega
                if(!empty($_POST['id_album']) && !empty($_POST['album']) && !empty($_POST['image']) && !empty($_POST['anio']) && !empty($_POST['score']) && !empty($_POST['artist'])){
                    $this->model->editAlbum($_POST['id_album'],$_POST['album'],$_POST['image'],$_POST['anio'],$_POST['score'],$_POST['artist']);
                    $this->view_user->showSucces($logged,"Album editado!");
                }else{
                    $this->view_user->showError($logged,"Error: faltan llenar campos!");
                }
            }else{
                $this->view_user->showError($logged,"No tenes permisos");
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
                $album = $this->model->getAlbum($id);//validar que el album exista
                if($album){
                    $this->model->dropAlbum($id);
                    $this->view->showAlbumsLocation();
                }else{
                    $this->view_user->showError($logged,"No existe el album!");
                }
            }else{
                $this->view_user->showError($logged,"No tenes permisos");
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
                if(!empty($_POST['album']) && !empty($_POST['image']) && !empty($_POST['anio']) && !empty($_POST['score']) && !empty($_POST['artist'])){
                        $id = $this->model->insertAlbum($_POST['album'],$_POST['image'],$_POST['anio'],$_POST['score'],$_POST['artist']);
                        if($id != 0){
                            $this->view_user->showSucces($logged,"Album creado!");
                        }else{
                            $this->view_user->showError($logged,"Error: no se pudo crear el album!");
                        }
                }else{
                    $this->view_user->showError($logged,"Error: Los campos no fueron llenados");
                }
            }else{
                $this->view_user->showError($logged,"No tenes permisos");
            }
        }else{
            $this->view_user->showLoginLocation();
        }
    } 
    
}