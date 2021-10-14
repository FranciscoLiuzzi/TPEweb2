<?php
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    require_once 'Controller/AlbumController.php';
    require_once 'Controller/ArtistController.php';
    require_once 'Controller/LoginController.php';
    require_once 'Controller/abmController.php';
    
    if (!empty($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = 'home';
    }

    $abmController = new abmController();
    $albumController = new AlbumController();
    $artistController = new ArtistController();
    $loginController = new LoginController();

    $params = explode('/', $action);

    switch($params[0]){
        case 'home':
            $albumController->showHome();
            break;
        case 'albums':
            $albumController->showAlbums();
            break;
        case 'album':
            $albumController->showAlbum($params[1]);
            break;
        case 'artist':
            if (!empty($params[1])){
                $albumController->showAlbumByArtist($params[1]);
            }else{
                $artistController->showArtists();
            }
            break;
        case 'createAlbum':
            $abmController->createAlbum();
            break;
        case 'deleteAlbum':
            $abmController->deleteAlbum($params[1]);
            break;
        case 'deleteArtist':
            $abmController->deleteArtist($params[1]);
            break;
        case 'createArtist':
            $abmController->createArtist();
            break;
        case 'editAlbum':
            $abmController->editAlbum();
            break;
        case 'editArtist':
            $abmController->editArtist();
            break;
        case 'login':
            $loginController->showLogin();
            break;
        case 'verifyUser':
            $loginController->verifyUser();
            break;
        case 'logout':
            $loginController->logout();
            break;
        case 'showAddAlbum':
            $abmController->showAddAlbum();
            break;
        case 'showAddArtist':
            $abmController->showAddArtist();
            break;
        default:
            echo('404 Page not found');
    }