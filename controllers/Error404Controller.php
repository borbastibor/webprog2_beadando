<?php

class Error404Controller {

	public $baseName = 'error404';

	public function index(array $vars) {
		$view = new View_Loader($this->baseName);
	}
}
