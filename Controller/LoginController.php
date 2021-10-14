<?php
require_once "./Model/LoginModel.php";
require_once "./View/LoginView.php";
require_once "./helpers/AuthHelper.php";


class LoginController {

    private $model;
    private $view;
    private $authhelper;
    

    public function __construct(){
        $this->model = new LoginModel();
        $this->view = new LoginView();
        $this->authhelper = new AuthHelper();
    }

    public function showLogin(){
        $logged = $this->authhelper->checkLogin();
        $this->view->showLogin($logged);
    }

    public function verifyUser() {
        if (!empty($_POST['user']) && !empty($_POST['password'])){
            $username = $_POST['user'];
            $password = $_POST['password'];

            $user = $this->model->getUsername($username); 

            if ($user && password_verify($password, $user->password)) {
                session_start();
                $_SESSION["user"] = $username;
                $this->view->showHome();
            } else {
                $logged = $this->authhelper->checkLogin();
                $this->view->showLogin($logged, "Credenciales invalidas");
            }
        }
        
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->showHome();
    }
}