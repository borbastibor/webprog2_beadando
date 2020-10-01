<?php
namespace controllers;

include_once('includes/View_Loader.php');
include_once('models/Hirek.php');

use includes\classes\HirDAO;
use includes\classes\Response;
use includes\Database;
use includes\View_Loader;
use models\Felhasznalok;
use models\Hirek;
use models\Jogosultsagok;

class NewsController {

    private $baseName = 'news';
    private $viewLevel = 0;
    private $crudLevel = 2;
    private $newsModel;
    private $usersModel;
    private $rightsModel;

    public function __construct() {
        $this->newsModel = new Hirek(Database::getConnection());
        $this->usersModel = new Felhasznalok(Database::getConnection());
        $this->rightsModel = new Jogosultsagok(Database::getConnection());
    }

    public function index() {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        }
        $dataarray = array();
        $allnews = $this->newsModel->getAll();
        foreach ($allnews as $newsitem) {
            $user = $this->usersModel->getById($newsitem['felhasznalo_id']);
            array_push($dataarray, array(
                'id' => $newsitem['id'],
                'cim' => $newsitem['cim'],
                'hir' => $newsitem['hir'],
                'datum' => $newsitem['datum'],
                'felhasznalo_id' => $newsitem['felhasznalo_id'],
                'felhasznalonev' => $user->bejelentkezes,
                'jog_szint' => $this->rightsModel->getLevelById($user->jog_id)
            ));
        }
        $view = new View_Loader($this->baseName.'_list', ['newslist' => $dataarray, 'crudlevel' => $this->crudLevel]);
    }

    public function edit($param) {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        }
        
        if ($_POST) {
            if (isset($_POST['edit_news'])) {
                $hirDao = new HirDAO();
                $hirDao->id = $_POST['id'];
                $hirDao->cim = $_POST['cim'];
                $hirDao->hir = $_POST['hir'];
                $hirDao->datum = date('Y-m-d H:i:s');
                $hirDao->felhasznalo_id = $this->usersModel->getByUsername($_SESSION['username'])->id;
                
                if ($hirDao->id == 0) {
                    if ($this->newsModel->insert($hirDao)) {
                        echo(json_encode(new Response(false, 'A beszúrás sikeres volt!')));
                        return;
                    } else {
                        echo(json_encode(new Response(true, 'A beszúrás sikertelen volt!')));
                        return;
                    }
                } else {
                    if ($this->newsModel->update($hirDao)) {
                        echo(json_encode(new Response(false, 'A módosítás sikeres volt!')));
                        return;
                    } else {
                        echo(json_encode(new Response(true, 'A módosítás sikertelen volt!')));
                        return;
                    }
                }
            }
        } else {
            $pArray = $this->getParamArray($param);
            $view = new View_Loader($this->baseName.'_edit', $this->newsModel->getById($pArray['id']) ?? null);
        }
        
    }

    public function delete($param) {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        } 
        if ($_POST) {
            if (isset($_POST['delete_news'])) {
                
                if (!$this->newsModel->delete($_POST['id'])) {
                    echo(json_encode(new Response(true, 'Nem sikerült a törlés!')));
                    return;
                } else {
                    echo(json_encode(new Response(false, 'Sikeres törlés!')));
                    return;
                }
            }
        } else {
            $pArray = $this->getParamArray($param);
            $view = new View_Loader($this->baseName.'_delete', $this->newsModel->getById($pArray['id']) ?? null);
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
        if ($ulevel < $this->viewLevel) {
            return false;
        }

        return true;
    }
}