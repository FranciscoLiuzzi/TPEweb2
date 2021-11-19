<?php

class ArtistView{

    private $smarty;
    
    function __construct(){
        $this->smarty = new Smarty();
    }

    function viewArtists($artists,$admin,$logged){
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('artists', $artists);
        $this->smarty->display('templates/artists.tpl');
       
    }

    function showArtistsLocation(){
        header("Location:".BASE_URL."artist");
    }
}