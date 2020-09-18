<?php

namespace webprog;
use webprog;

include_once('includes/utils.php');

class HomeController extends AbstractController {

	public $baseName = 'mainpage';

	public function index() {
		$view = new View_Loader($this->baseName);
	}

	public function login() {
		$view = new View_Loader('login');
	}

	public function register() {
		$view = new View_Loader('registration');
	}
}
