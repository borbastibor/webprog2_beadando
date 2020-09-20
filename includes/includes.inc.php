<?php
// alkalmazás gyökér könyvtára a szerveren és URL cím az alkalmazás gyökeréhez
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/webprog2_beadando/');
define('SITE_ROOT', 'http://localhost/webprog2_beadando/');

// include classes
include_once(SERVER_ROOT.'includes/classes/AbstractDAO.php');
include_once(SERVER_ROOT.'includes/classes/AbstractModel.php');
include_once(SERVER_ROOT.'includes/classes/FelhasznaloDAO.php');
include_once(SERVER_ROOT.'includes/classes/HirDAO.php');
include_once(SERVER_ROOT.'includes/classes/JogosultsagDAO.php');
include_once(SERVER_ROOT.'includes/classes/MenuDAO.php');
include_once(SERVER_ROOT.'includes/classes/VelemenyDAO.php');
include_once(SERVER_ROOT.'includes/classes/Route.php');
include_once(SERVER_ROOT.'includes/classes/Response.php');

// include models
include_once(SERVER_ROOT.'models/Felhasznalok.php');
include_once(SERVER_ROOT.'models/Jogosultsagok.php');
include_once(SERVER_ROOT.'models/Menuk.php');

// include controllers
include_once(SERVER_ROOT.'controllers/AccessController.php');
include_once(SERVER_ROOT.'controllers/HomeController.php');

