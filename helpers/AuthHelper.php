<?php

class AuthHelper {
    public function __construct() {

    }

    public function checkLogin() {
        session_start();
        if (!isset($_SESSION['user'])){
            return false;
        }else{
            return true;
        }     
        
    }

    public function checkAdmin() {
        if(isset($_SESSION['user'])){
            if (($_SESSION["role"]) == "usuario"){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
         
    }

}
