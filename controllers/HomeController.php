<?php
include_once('includes/classes/AbstractController.php');
include_once('includes/View_Loader.php');

class HomeController extends AbstractController {

	public $baseName = 'home';
	public $params;

	public function __construct(string $params) {
		$this->params = $params;
	}

	public function index() {
		$view = new View_Loader($this->baseName);
	}

	public function login() {
		$view = new View_Loader('login');
	}

	public function logout() {
		
	}

	public function register() {
		$view = new View_Loader('registration');
	}
}
