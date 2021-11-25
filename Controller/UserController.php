<?php
require_once "./Model/UserModel.php";
require_once "./View/UserView.php";
require_once "./helpers/AuthHelper.php";
require_once "./Model/ArtistModel.php";
require_once "./Model/AlbumModel.php";


class UserController {

    private $model;
    private $view;
    private $authhelper;
    

    public function __construct(){
        $this->model_artist = new artistModel();
        $this->model_album = new albumModel();
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->authhelper = new AuthHelper();
    }

    public function showLogin(){
        $logged = $this->authhelper->checkLogin();
        $this->view->showLogin($logged);
    }

    public function registerUser(){
        if (!empty($_POST['user']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $user = $_POST['user'];
            $email = $_POST['email'];
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $id = $this->model->insertUser($user,$hash,$email);
            if($id != 0){
                $this->verifyUser($user,$_POST['password']);
            }else{
                $this->view_user->showError(false,"Error: no se pudo registrar");
            }
        }else{
            $this->view->showLogin(false, "Llene los campos");
        }
    }

    public function verifyUser() {
        if (!empty($_POST['user']) && !empty($_POST['password'])){
            $username = $_POST['user'];
            $password = $_POST['password'];

            $user = $this->model->getUsername($username); 

            if ($user->user && password_verify($password, $user->password)){
                session_start();
                $_SESSION["user"] = $user->user;
                $_SESSION["role"] = $user->role;
                $_SESSION["id"] = $user->id_user;
                $_SESSION["email"] = $user->email;

                $this->view->showHome();
            } else {
                $logged = $this->authhelper->checkLogin();
                $this->view->showLogin($logged, "Credenciales invalidas");
            }
        }else{
            $this->view->showLogin(false, "Llene los campos");
        }
    }

    public function showRegister(){
        $logged = $this->authhelper->checkLogin();
        $this->view->showRegister($logged);
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->showHome();
    }

    function showAdmin(){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        $albums = $this->model_album->getAlbums();
        $artists = $this->model_artist->getArtists();
        $users = $this->model->getUsers();
        if($logged == true){
            if($admin == true){
                $this->view->displayAdmin($logged,$artists,$albums,$users);
            }else{
                $this->view->showError($logged,"No tenes permisos!");
            }
        }else{
            $this->view->showLoginLocation();
        }
    }

    function deleteUser($id){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        if($logged == true){
            if($admin == true){
                $user = $this->model->getUserbyId($id);
                if(!empty($user)){
                    $this->model->dropUser($id);
                    $this->view->showAdminLocation();
                }else{
                    $this->view->showError($logged,"Usuario no existe!");
                }
            }else{
                $this->view->showError($logged,"No tenes permisos!");
            }
        }else{
            $this->view->showLoginLocation();
        }
    }

    function giveAdmin($id){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        if($logged == true){
            if($admin == true){
                $user = $this->model->getUserbyId($id);
                if(!empty($user)){
                    $this->model->setAdmin($id);
                    $this->view->showAdminLocation();
                }else{
                    $this->view->showError($logged,"Usuario no existe!");
                }
            }else{
                $this->view->showError($logged,"No tenes permisos!");
            }
        }else{
            $this->view->showLoginLocation();
        }
    }

    function deleteAdmin($id){
        $logged = $this->authhelper->checkLogin();
        $admin = $this->authhelper->checkAdmin();
        if($logged == true){
            if($admin == true){
                $user = $this->model->getUserbyId($id);
                if(!empty($user)){
                    $this->model->dropAdmin($id);
                    $this->view->showAdminLocation();
                }else{
                    $this->view->showError($logged,"Usuario no existe!");
                }
            }else{
                $this->view->showError($logged,"No tenes permisos!");
            }
        }else{
            $this->view->showLoginLocation();
        }
    }
}