<?php

class LoginView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    public function showLogin($logged, $error = "") {
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('error', $error); 
        $this->smarty->display('templates/login.tpl');
    }

    public function showHome(){
        
        header("Location:".BASE_URL."home");
    }
}