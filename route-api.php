<?php
require_once 'libs/Router.php';
require_once 'Controller/APIController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comment/:ID', 'GET', 'CommentApiController', 'getComments');
$router->addRoute('comment/:ID', 'POST', 'CommentApiController', 'postComment');
$router->addRoute('comment/:ID', 'DELETE', 'CommentApiController', 'deleteComment');


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
