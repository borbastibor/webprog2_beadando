<?php
namespace controllers;

use includes\View_Loader;

class Nyitolap_Controller
{
    private $baseName = 'user'; 
    
	public function index() {
		$view = new View_Loader($this->baseName."_list");
    }
    
    public function edit() {
        $view = new View_Loader($this->baseName."_edit");
    }
}