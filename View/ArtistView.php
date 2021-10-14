<?php

class ArtistView{

    private $smarty;
    
    function __construct(){
        $this->smarty = new Smarty();
    }

    function viewArtists($artists,$logged){
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('artists', $artists);
        $this->smarty->display('templates/artists.tpl');
       
    }

    
}