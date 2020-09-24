<?php
namespace controllers;

include_once('includes/View_Loader.php');

use includes\View_Loader;

class Error404Controller {

	public $baseName = 'error404';

	public function error() {
		$view = new View_Loader($this->baseName);
	}
}
