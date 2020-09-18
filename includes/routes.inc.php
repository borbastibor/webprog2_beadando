<?php
include_once('includes/classes/Route.php');
include_once('includes/Router.php');

$router = new Router();

// Route-k regisztrálása
$router->register(new Route('/()()$/', 'HomeController', 'index'));
$router->register(new Route('/(\/home\/)(\w+)$/', 'HomeController', 'index'));
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