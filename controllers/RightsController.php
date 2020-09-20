<?php

class RightsController {

    private $baseName = 'rights';

    public function index() {
        $view = new View_Loader($this->baseName."_list");
    }

    public function edit($id) {
        $view = new View_Loader($this->baseName."_edit");
    }
}