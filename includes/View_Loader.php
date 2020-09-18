<?php

class View_Loader {
    
    private $data = array();
    private $render = FALSE;
    private $selectedItems = FALSE;
    private $style = FALSE;
    private $jscript = FALSE;

    public function __construct($viewName) {
        $file = 'views/' . strtolower($viewName) . '.php';

        if (file_exists($file))
        {
            $this->render = $file;
            //$this->selectedItems = explode("_", $viewName);
        } 

        $file = 'css/' . strtolower($viewName) . '.css';

        if (file_exists($file))
        {
            $this->style = 'css/' . strtolower($viewName) . '.css';
        }
        
        $file = 'js/' . strtolower($viewName) . '.js';

        if (file_exists($file))
        {
            $this->jscript = 'js/' . strtolower($viewName) . '.js';
        }        
    }

    public function assign($variable , $value) {
        $this->data[$variable] = $value;
    }

    public function __destruct() {
        $this->data['render'] = $this->render;
        $this->data['selectedItems'] = $this->selectedItems;
        $this->data['style'] = $this->style;
        $this->data['jscript'] = $this->jscript;
        $viewData = $this->data;
        include_once('views/page.tpl.php');
    }
}
