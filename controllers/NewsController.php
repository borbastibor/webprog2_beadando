<?php
namespace controllers;

use includes\View_Loader;

class NewsController {

    private $baseName = 'news';

    public function index() {
        $view = new View_Loader($this->baseName."_list");
    }

    public function edit($id) {
        $view = new View_Loader($this->baseName."_edit");
    }
}