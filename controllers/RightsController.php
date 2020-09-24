<?php
namespace controllers;

include_once('includes/View_Loader.php');
include_once('models/Jogosultsagok.php');

use includes\classes\Response;
use includes\Database;
use includes\View_Loader;
use models\Jogosultsagok;

class RightsController {

    private $baseName = 'rights';

    public function index() {
        $rightsModel = new Jogosultsagok(Database::getConnection());
        $view = new View_Loader($this->baseName.'_list', ['rightlist' => $rightsModel->getAll()]);
    }

    public function edit($param) {
        if ($_POST) {
            if (isset($_POST['edit_right'])) {
                //TODO
                echo(json_encode(new Response(false, 'Ez egy edit POST!')));
            }
        } else {
            $pArray = $this->getParamArray($param);
            $rightsModel = new Jogosultsagok(Database::getConnection());
            $view = new View_Loader($this->baseName.'_edit', $rightsModel->getById($pArray['id']) ?? null);
        }
        
    }

    private function getParamArray($param) {
        $parray = explode('?', $param);
        $earray = array_pop($parray);
        $farray = explode('=', $earray);
        $result[$farray[0]] = $farray[1];
        return $result;
    }
}