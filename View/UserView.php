<?php

class UserView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    public function showLogin($logged, $error = "") {
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('error', $error); 
        $this->smarty->display('templates/login.tpl');
    }

    public function showRegister($logged, $error = "") {
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('error', $error); 
        $this->smarty->display('templates/register.tpl');
    }

    public function showHome(){
        header("Location:".BASE_URL."home");
    
    }

    function showLoginLocation(){
        header("Location:".BASE_URL."login");
    }

    function displayAdmin($logged, $artists,$albums,$users){
        $this->smarty->assign('albums', $albums);
        $this->smarty->assign('artists', $artists);
        $this->smarty->assign('users', $users);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('templates/admin.tpl');
    }

    public function showSucces($logged, $notification = "") {
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('notification', $notification); 
        $this->smarty->display('templates/succes.tpl');
    }

    public function showError($logged, $notification = "") {
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('notification', $notification); 
        $this->smarty->display('templates/error.tpl');
    }
}