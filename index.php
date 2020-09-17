<?php

// alkalmazás gyökér könyvtára a szerveren
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/webprog2_beadando/');

// URL cím az alkalmazás gyökeréhez
define('SITE_ROOT', 'http://localhost/webprog2_beadando/');

spl_autoload_extensions('.php');
spl_autoload_register();

// router példányosítása
$router = new Router();

// Route-k regisztrálása
$router->register(new Route('/^\/gallery\/(\w+)$/', 'GalleryController', 'display'));

// Router meghívása a request-el
$router->handleRequest($_SERVER['REQUEST_URI']);

?>