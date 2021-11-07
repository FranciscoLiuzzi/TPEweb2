<?php

require_once 'libs/Router.php';
require_once 'Controller/ApiAlbumController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('albums', 'GET', 'ApiAlbumController', 'getAlbums');
$router->addRoute('albums', 'POST', 'ApiAlbumController', 'insertAlbum');
$router->addRoute('albums/:ID', 'GET', 'ApiAlbumController', 'getAlbum');



// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
