<?php

include_once('includes/utils.php');
include_once('includes/Router.php');

// alkalmazás gyökér könyvtára a szerveren és URL cím az alkalmazás gyökeréhez
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/webprog2_beadando/');
define('SITE_ROOT', 'http://localhost/webprog2_beadando/');

$router = new Router();

// Route-k regisztrálása
$router->register(new Route('/^\/home\/(\w+)$/', 'HomeController', 'index'));
$router->register(new Route('/^\/home\/(\w+)$/', 'HomeController', 'login'));
$router->register(new Route('/^\/home\/(\w+)$/', 'HomeController', 'register'));
$router->register(new Route('/^\/users\/(\w+)$/', 'UserController', 'index'));
$router->register(new Route('/^\/users\/(\w+)$/', 'UserController', 'edit'));
$router->register(new Route('/^\/rights\/(\w+)$/', 'RightsController', 'index'));
$router->register(new Route('/^\/rights\/(\w+)$/', 'RightsController', 'edit'));
$router->register(new Route('/^\/news\/(\w+)$/', 'NewsController', 'index'));
$router->register(new Route('/^\/news\/(\w+)$/', 'NewsController', 'edit'));
$router->register(new Route('/^\/comments\/(\w+)$/', 'CommentsController', 'index'));
$router->register(new Route('/^\/comments\/(\w+)$/', 'CommentsController', 'edit'));
$router->register(new Route('/^\/error404\/(\w+)$/', 'Error404Controller', 'index'));

// Router meghívása a request-el
$router->handleRequest($_SERVER['REQUEST_URI']);
