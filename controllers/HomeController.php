<?php
namespace controllers;

include_once('includes/View_Loader.php');

use includes\View_Loader;
use includes\Session;

class HomeController {

	public $baseName = 'home';
	public $params;

	public function index() {
		$view = new View_Loader($this->baseName);
	}

	public function login() {
		if ($_POST) {
			if (isset($_POST['login'])) {
				echo('Ez login!');
			} elseif (isset($_POST['register'])) {
				echo('Ez regisztráció!');
			}
		} else {
			$view = new View_Loader('login');
		}
	}

	public function logout() {
		Session::resetSession();
	}

}
