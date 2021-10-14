<?php

class AuthHelper {
    public function __construct() {

    }

    /*public function login($user) {
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['USERNAME'] = $user->username;
    }

    public function logout() {
        session_start();
        session_destroy();
    }*/

    public function checkLogin() {
        session_start();
        if (!isset($_SESSION['user'])) {
            return false;
        }else{
            return true;
        }     
    }

}
