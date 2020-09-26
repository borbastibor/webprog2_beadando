<?php
namespace includes;

include_once('controllers/Router.php');
include_once('includes/classes/Route.php');

use includes\classes\Route;
use controllers\Router;

$router = new Router();

// Route-k regisztrálása
//$router->register(new Route('/^()$/', 'HomeController', 'index'));
$router->register(new Route('#(home/index)#', 'HomeController', 'index'));
$router->register(new Route('#(home/login)#', 'HomeController', 'login'));
$router->register(new Route('#(home/logout)#', 'HomeController', 'logout'));
$router->register(new Route('#(rights/index)#', 'RightsController', 'index'));
$router->register(new Route('#(rights/create.*)#', 'RightsController', 'create'));
$router->register(new Route('#(rights/delete.*)#', 'RightsController', 'delete'));
$router->register(new Route('#(users/index)#', 'UsersController', 'index'));
$router->register(new Route('#(users/edit.*)#', 'UsersController', 'edit'));
$router->register(new Route('#(users/delete.*)#', 'UsersController', 'delete'));
$router->register(new Route('#(news/index)#', 'NewsController', 'index'));
$router->register(new Route('#(news/edit.*)#', 'NewsController', 'edit'));
$router->register(new Route('#(news/delete.*)#', 'NewsController', 'delete'));
$router->register(new Route('#(comments/index)#', 'CommentsController', 'index'));
$router->register(new Route('#(comments/edit.*)#', 'CommentsController', 'edit'));
$router->register(new Route('#(comments/delete.*)#', 'CommentsController', 'delete'));
$router->register(new Route('#(error/error.*)#', 'ErrorController', 'error'));

// Router meghívása a request-el
$router->handleRequest($_SERVER['REQUEST_URI']);