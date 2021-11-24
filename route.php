<?php
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    require_once 'Controller/AlbumController.php';
    require_once 'Controller/ArtistController.php';
    require_once 'Controller/UserController.php';
    
    if (!empty($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = 'home';
    }

    $albumController = new AlbumController();
    $artistController = new ArtistController();
    $userController = new UserController();

    $params = explode('/', $action);

    switch($params[0]){
        case 'home':
            $albumController->showHome();
            break;
    /*--------------------------------------------ALBUMS----------------------------------------------------*/
        case 'albums':
            //$albumController->showAlbums();
            if (!empty($params[1])){
                $albumController->showAlbumsN($params[1]);
            }else{
                $albumController->showAlbumsN();
            }
            break;
        case 'album':
            $albumController->showAlbum($params[1]);
            break;
        case 'createAlbum':
            $albumController->createAlbum();
            break;
        case 'deleteAlbum':
            $albumController->deleteAlbum($params[1]);
            break;
        case 'editAlbum':
            $albumController->editAlbum();
            break;
    /*--------------------------------------------ARTISTAS----------------------------------------------------*/
        case 'artist':
            if (!empty($params[1])){
                $albumController->showAlbumByArtist($params[1]);
            }else{
                $artistController->showArtists();
            }
            break;
        case 'deleteArtist':
            $artistController->deleteArtist($params[1]);
            break;
        case 'createArtist':
            $artistController->createArtist();
            break;
        case 'editArtist':
            $artistController->editArtist();
            break;
    /*--------------------------------------------USUARIOS----------------------------------------------------*/
        case 'login':
            $userController->showLogin();
            break;
        case 'register':
            $userController->showRegister();
            break;
        case 'verifyUser':
            $userController->verifyUser();
            break;
        case 'createUser':
            $userController->registerUser();
            break;
        case 'logout':
            $userController->logout();
            break;
        case 'admin':
            $userController->showAdmin();
            break;
        case 'giveAdmin':
            $userController->giveAdmin($params[1]);
            break;
        case 'deleteAdmin':
            $userController->deleteAdmin($params[1]);
            break;
        case 'deleteUser':
            $userController->deleteUser($params[1]);
            break;
        default:
            echo('404 Page not found');
    }