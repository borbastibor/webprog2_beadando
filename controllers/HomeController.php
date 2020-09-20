<?php
include_once('includes/View_Loader.php');

class HomeController {

	public $baseName = 'home';
	public $params;

	// public function __construct($params) {
	// 	$this->params = $params;
	// }

	public function index() {
		$view = new View_Loader($this->baseName);
	}

	public function login() {
		$view = new View_Loader('login');
	}

	public function loginPost($postParams) {
		echo($this->params);
	}

	public function logout() {
		Session::resetSession();
	}

}
