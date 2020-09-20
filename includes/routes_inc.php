<?php
namespace includes;

include_once('controllers/Router.php');
include_once('includes/classes/Route.php');

use includes\classes\Route;
use controllers\Router;

$router = new Router();

// Route-k regisztrálása
//$router->register(new Route('/^()()$/', 'HomeController', 'index'));
$router->register(new Route('#(home/index)#', 'HomeController', 'index'));
$router->register(new Route('#(home/login)#', 'HomeController', 'login'));
$router->register(new Route('#(home/logout)#', 'HomeController', 'logout'));
//$router->register(new Route('#(home/loginPost)#', 'HomeController', 'loginPost'));

// Router meghívása a request-el
$router->handleRequest($_SERVER['REQUEST_URI']);