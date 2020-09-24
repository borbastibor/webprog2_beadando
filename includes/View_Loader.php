<?php
namespace includes;

class View_Loader {
    
    private $data = array();
    private $render = FALSE;
    private $style = FALSE;
    private $jscript = FALSE;
    private $userdata = FALSE;

    public function __construct($viewName, $userdata = FALSE) {
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
        
        $this->userdata = $userdata;
    }

    public function __destruct() {
        $this->data['render'] = $this->render;
        $this->data['style'] = $this->style;
        $this->data['jscript'] = $this->jscript;
        $this->data['data'] = $this->userdata;
        $viewData = $this->data;
        include_once('views/page.tpl.php');
    }
}
