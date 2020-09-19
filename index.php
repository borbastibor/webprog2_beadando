<?php
// alkalmazás gyökér könyvtára a szerveren és URL cím az alkalmazás gyökeréhez
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/webprog2_beadando/');
define('SITE_ROOT', 'http://localhost/webprog2_beadando/');

include_once('includes/database.inc.php');
include_once('includes/session.inc.php');
include_once('includes/menu.inc.php');

// routing
include_once('includes/routes.inc.php');