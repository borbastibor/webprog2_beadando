<?php
namespace controllers;

include_once('includes/View_Loader.php');
include_once('models/Jogosultsagok.php');
include_once('models/Felhasznalok.php');

use includes\classes\FelhasznaloDAO;
use includes\classes\Response;
use includes\Database;
use includes\View_Loader;
use models\Felhasznalok;
use models\Jogosultsagok;

class UsersController {

    private $baseName = 'user';
    private $rightLevel = 100;
    private $rightsModel;
    private $usersModel;

    public function __construct() {
        $this->usersModel = new Felhasznalok(Database::getConnection());
        $this->rightsModel = new Jogosultsagok(Database::getConnection());
    }

    /**
     * index metódus a listanézetet tölti be
     */
    public function index() {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        }
        $view = new View_Loader($this->baseName.'_list', ['userlist' => $this->createArrayForAll()]);
    }

    /**
     * edit metódus új felhasználó hozzáadására vagy meglévő felhasználó szerkesztését vezérli
     */
    public function edit($param) {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        }
        if ($_POST) {
            if (isset($_POST['edit_user'])) {
                $userDao = new FelhasznaloDAO();
                $userDao->id = $_POST['id'];
                $userDao->csaladi_nev = $_POST['csaladi_nev'];
                $userDao->utonev = $_POST['utonev'];
                $userDao->bejelentkezes = $_POST['bejelentkezes'];
                $userDao->jelszo = password_hash($_POST['jelszo'], PASSWORD_DEFAULT);
                $userDao->jog_id = $_POST['jog_id']; 
                $usernameExists = $this->usersModel->isUsernameInUsers($userDao->bejelentkezes);

                if ($userDao->id == 0) {
                    if ($usernameExists) {
                        echo(json_encode(true, 'A megadott felhasználónév már létezik!'));
                        return;
                    } else {
                        if ($this->usersModel->insert($userDao)) {
                            echo(json_encode(false, 'A beszúrás sikeres volt!'));
                            return;
                        } else {
                            echo(json_encode(true, 'A beszúrás sikertelen volt!'));
                            return;
                        }
                    }
                } else {
                    $oldUser = $this->usersModel->getById($userDao->id);
                    if ($userDao->jelszo == '') {
                        $userDao->jelszo = $oldUser->jelszo;
                    }
                    if ($oldUser != null && $oldUser->bejelentkezes != $userDao->bejelentkezes && $usernameExists) {
                        echo(json_encode(true, 'A megadott felhasználónév már létezik!'));
                        return;
                    } else {
                        if ($this->usersModel->update($userDao)) {
                            echo(json_encode(false, 'A módosítás sikeres volt!'));
                            return;
                        } else {
                            echo(json_encode(true, 'A módosítás sikertelen volt!'));
                            return;
                        }
                    }
                }
            }
        } else {
            $pArray = $this->getParamArray($param);
            $data['userdata'] = $this->createArrayForSingle($pArray['id']);
            $data['jogok'] = $this->rightsModel->getAll();
            $view = new View_Loader($this->baseName.'_edit', $data);
        }
        
    }

    /**
     * delete metódus a felhasználókhoz
     */
    public function delete($param) {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        } 
        if ($_POST) {
            if (isset($_POST['delete_user'])) {
                
                if (!$this->usersModel->delete($_POST['id'])) {
                    echo(json_encode(new Response(true, 'Nem sikerült a törlés!')));
                    return;
                } else {
                    echo(json_encode(new Response(false, 'Sikeres törlés!')));
                    return;
                }
            }
        } else {
            $pArray = $this->getParamArray($param);
            $view = new View_Loader($this->baseName.'_delete', $this->createArrayForSingle($pArray['id']));
        }
    }

    /**
     * getParamArray metódus felbontja egy asszociatív tömbbe az adott kontrollernek átadott paraméterlistát
     */
    private function getParamArray($param) {
        $parray = explode('?', $param);
        $earray = array_pop($parray);
        $farray = explode('=', $earray);
        $result[$farray[0]] = $farray[1];

        return $result;
    }

    /**
     * isAuthorized metódus ellenőrzi a felhasználó hozzáférési jogosultságát
     */
    private function isAuthorized() {
        $ulevel = isset($_SESSION['userlevel']) ? $_SESSION['userlevel'] : 0;
        if ($ulevel < $this->rightLevel) {
            return false;
        }

        return true;
    }

    /**
     * createArrayForSingle metódus visszatér a szerkesztési nézethez szükséges adatokkal
     */
    private function createArrayForSingle($id) {
        $singleUser = $this->usersModel->getById($id);

        if ($singleUser == null) {
            return null;
        }

        $rightItem = $this->rightsModel->getById($singleUser->jog_id);
        $rightName = $rightItem == null ? '' : $rightItem['jog_nev'];
        $result = array(
            'id' => $singleUser->id,
            'csaladi_nev' => $singleUser->csaladi_nev,
            'utonev' => $singleUser->utonev,
            'bejelentkezes' => $singleUser->bejelentkezes,
            'jog_nev' => $rightName
        );

        return $result;
    }

    /**
     * createArrayForAll metódus visszatér a listanézethez szükséges adatokkal
     */
    private function createArrayForAll() {
        $result = array();
        $allUser = $this->usersModel->getAll();

        if ($allUser == null) {
            return null;
        }

        foreach ($allUser as $useritem) {
            $rightItem = $this->rightsModel->getById($useritem['jog_id']);
            $rightName = $rightItem == null ? '' : $rightItem['jog_nev'];
            array_push($result, array(
                'id' => $useritem['id'],
                'csaladi_nev' => $useritem['csaladi_nev'],
                'utonev' => $useritem['utonev'],
                'bejelentkezes' => $useritem['bejelentkezes'],
                'jog_nev' => $rightName
            ));
        }

        return $result;
    }
}