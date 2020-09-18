<?php
// alkalmazás gyökér könyvtára a szerveren és URL cím az alkalmazás gyökeréhez
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/webprog2_beadando/');
define('SITE_ROOT', 'http://localhost/webprog2_beadando/');

// include database and routing
include_once('includes/database.inc.php');
include_once('includes/routes.inc.php');