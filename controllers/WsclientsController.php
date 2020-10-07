<?php
namespace controllers;

include_once('includes/View_Loader.php');

use includes\View_Loader;

class WsclientsController {

	private $baseName = 'wsclients';

	public function soapClient() {
		$view = new View_Loader($this->baseName.'_soap');
	}

    public function restClient() {
        $view = new View_Loader($this->baseName.'_rest');
    }
	
}