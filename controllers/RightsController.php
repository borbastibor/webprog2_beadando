<?php
namespace controllers;

include_once('includes/View_Loader.php');
include_once('models/Jogosultsagok.php');

use includes\classes\JogosultsagDTO;
use includes\classes\Response;
use includes\Database;
use includes\View_Loader;
use models\Jogosultsagok;

class RightsController {

    private $baseName = 'rights';
    private $rightLevel = 100;
    private $rightsModel;

    public function __construct() {
        $this->rightsModel = new Jogosultsagok(Database::getConnection());
    }

    public function index() {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        }
        $view = new View_Loader($this->baseName.'_list', ['rightlist' => $this->rightsModel->getAll()]);
    }

    public function create() {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        }
        if ($_POST) {
            if (isset($_POST['create_right'])) {
                $jogDao = new JogosultsagDTO();
                $jogDao->jog_nev = $_POST['right_name'];
                $jogDao->jog_szint = $_POST['right_level'];
                $right_name_exists = $this->rightsModel->isNameInRights($jogDao->jog_nev);
                $right_level_exists = $this->rightsModel->isLevelInRights($jogDao->jog_szint);

                if ($right_level_exists) {
                    echo(json_encode(new Response(true, 'Ez jogosultság szint már létezik!')));
                    return;
                } elseif ($right_name_exists) {
                    echo(json_encode(new Response(true, 'Ez jogosultság név már létezik!')));
                    return;
                }
                if ($this->rightsModel->insert($jogDao)) {
                    echo(json_encode(new Response(false, 'A beszúrás sikeres volt!')));
                    return;
                } else {
                    echo(json_encode(new Response(true, 'A beszúrás sikertelen volt!')));
                    return;
                }
            }
        } else {
            $view = new View_Loader($this->baseName.'_create');
        }
        
    }

    public function delete($param) {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        } 
        if ($_POST) {
            if (isset($_POST['delete_right'])) {
                
                if (!$this->rightsModel->delete($_POST['id'])) {
                    echo(json_encode(new Response(true, 'Nem sikerült a törlés!')));
                    return;
                } else {
                    echo(json_encode(new Response(false, 'Sikeres törlés!')));
                    return;
                }
            }
        } else {
            $pArray = $this->getParamArray($param);
            $view = new View_Loader($this->baseName.'_delete', $this->rightsModel->getById($pArray['id']) ?? null);
        }
    }

    private function getParamArray($param) {
        $parray = explode('?', $param);
        $earray = array_pop($parray);
        $farray = explode('=', $earray);
        $result[$farray[0]] = $farray[1];

        return $result;
    }

    private function isAuthorized() {
        $ulevel = isset($_SESSION['userlevel']) ? $_SESSION['userlevel'] : 0;
        if ($ulevel < $this->rightLevel) {
            return false;
        }

        return true;
    }
}