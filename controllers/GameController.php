<?php
namespace controllers;

include_once('includes/View_Loader.php');

use includes\View_Loader;

class GameController {

    private $baseName = 'game';

    public function index() {
        $view = new View_Loader($this->baseName);
    }
}