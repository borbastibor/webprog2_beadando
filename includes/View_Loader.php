<?php

class View_Loader {
    
    private $data = array();
    private $render = FALSE;
    private $selectedItems = FALSE;
    private $style = FALSE;
    private $jscript = FALSE;

    public function __construct($viewName) {
        $file = SERVER_ROOT.'views/'.strtolower($viewName).'.php';

        if (file_exists($file))
        {
            $this->render = $file;
        } 

        $file = SERVER_ROOT.'css/'.strtolower($viewName).'.css';

        if (file_exists($file))
        {
            $this->style = SITE_ROOT.'css/'.strtolower($viewName).'.css';
        }
        
        $file = SERVER_ROOT.'js/'.strtolower($viewName).'.js';

        if (file_exists($file))
        {
            $this->jscript = SITE_ROOT.'js/'.strtolower($viewName).'.js';
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
