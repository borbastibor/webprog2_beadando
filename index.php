<?php
session_start();

define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/webprog2_beadando/');
define('SITE_ROOT', 'http://localhost/webprog2_beadando/');

include_once('includes/database_inc.php');
include_once('includes/menu_inc.php');
include_once('includes/routes_inc.php');