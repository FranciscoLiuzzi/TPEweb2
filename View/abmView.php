<?php
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class abmView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function displayEdit($logged,$id){
        $this->smarty->assign('id', $id);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('templates/abm.tpl');
    }
    function displayAbm($logged, $artists,$albums){
        $this->smarty->assign('albums', $albums);
        $this->smarty->assign('artists', $artists);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('templates/addEditAlbum.tpl');
    }
    function displayAddArtist($logged,$artists){
        $this->smarty->assign('artists', $artists);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('templates/addEditArtist.tpl');
    }

    function showAddArtistLocation(){
        header("Location:".BASE_URL."showAddArtist");
    }

    function showAddAlbumLocation(){
        header("Location:".BASE_URL."showAddAlbum");
    }

    function showLoginLocation(){
        header("Location:".BASE_URL."login");
    }

    function showAlbumsLocation(){
        header("Location:".BASE_URL."albums");
    }

    function showArtistsLocation(){
        header("Location:".BASE_URL."artist");
    }
}
