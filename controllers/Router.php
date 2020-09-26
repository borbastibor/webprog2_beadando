<?php
namespace controllers;

include_once('controllers/HomeController.php');
include_once('controllers/ErrorController.php');
include_once('controllers/RightsController.php');
include_once('controllers/UsersController.php');

use includes\classes\Route;
use \ReflectionClass;

class Router {

    private $routes = array();

    public function register(Route $route) {
        array_push($this->routes, $route);
    }

    public function handleRequest(string $request) {
        $matches = array();

        foreach ($this->routes as $route) {
            if (preg_match($route->path, $request, $matches)) {
                // $matches[0] will always be equal to $request, so we just shift it off
                array_shift($matches);
                // here comes the magic
                $class = new ReflectionClass(__NAMESPACE__.'\\'.$route->controller);
                $method = $class->getMethod($route->method);
                // we instantiate a new class using the elements of the $matches array
                $instance = $class->newInstance();
                // equivalent:
                // $instance = $class->newInstanceArgs($matches);
                // then we call the method on the newly instantiated object
                $method->invokeArgs($instance, $matches);
                // finally, we return from the function, because we do not want the request to be handled more than once
                return;
            }
        }

        $errorController = new ErrorController();
        $errorController->error('?code=404');
    }
}