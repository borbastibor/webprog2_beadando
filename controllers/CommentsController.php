<?php
namespace controllers;

include_once('includes/View_Loader.php');
include_once('models/Velemenyek.php');

use includes\classes\VelemenyDTO;
use includes\classes\Response;
use includes\Database;
use includes\View_Loader;
use models\Felhasznalok;
use models\Velemenyek;
use models\Jogosultsagok;

class CommentsController {

    private $baseName = 'comments';
    private $viewLevel = 0;
    private $commentsModel;
    private $usersModel;
    private $rightsModel;

    public function __construct() {
        $this->commentsModel = new Velemenyek(Database::getConnection());
        $this->usersModel = new Felhasznalok(Database::getConnection());
        $this->rightsModel = new Jogosultsagok(Database::getConnection());
    }

    public function index() {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        }
        $dataarray = array();
        $allcomments = $this->commentsModel->getAll();
        foreach ($allcomments as $commentitem) {
            $user = $this->usersModel->getById($commentitem['felhasznalo_id']);
            array_push($dataarray, array(
                'id' => $commentitem['id'],
                'velemeny' => $commentitem['velemeny'],
                'email' => $commentitem['email'],
                'datum' => $commentitem['datum'],
                'felhasznalo_id' => $commentitem['felhasznalo_id'],
                'felhasznalonev' => $user->bejelentkezes,
                'jog_szint' => $this->rightsModel->getLevelById($user->jog_id)
            ));
        }
        $view = new View_Loader($this->baseName.'_list', $dataarray);
    }

    public function edit($param) {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        }

        if ($_POST) {
            if (isset($_POST['edit_comment'])) {
                $VelemenyDTO = new VelemenyDTO();
                $VelemenyDTO->id = $_POST['id'];
                $VelemenyDTO->velemeny = $_POST['velemeny'];
                $VelemenyDTO->email = $_POST['email'];
                $VelemenyDTO->datum = date('Y-m-d H:i:s');
                $VelemenyDTO->felhasznalo_id = $this->usersModel->getByUsername($_SESSION['username'])->id;

                if ($VelemenyDTO->id == 0) {
                    if ($this->commentsModel->insert($VelemenyDTO)) {
                        echo(json_encode(new Response(false, 'A beszúrás sikeres volt!')));
                        return;
                    } else {
                        echo(json_encode(new Response(true, 'A beszúrás sikertelen volt!')));
                        return;
                    }
                } else {
                    if ($this->commentsModel->update($VelemenyDTO)) {
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
            $view = new View_Loader($this->baseName.'_edit', $this->commentsModel->getById($pArray['id']) ?? null);
        }
        
    }

    public function delete($param) {
        if (!$this->isAuthorized()) {
            header('Location: error/error?code=auth');
        } 
        if ($_POST) {
            if (isset($_POST['delete_comment'])) {
                
                if (!$this->commentsModel->delete($_POST['id'])) {
                    echo(json_encode(new Response(true, 'Nem sikerült a törlés!')));
                    return;
                } else {
                    echo(json_encode(new Response(false, 'Sikeres törlés!')));
                    return;
                }
            }
        } else {
            $pArray = $this->getParamArray($param);
            $comment = $this->commentsModel->getById($pArray['id']) ?? null;
            $user = $this->usersModel->getById($comment['felhasznalo_id']) ?? null;
            $dataarray = [
                'id' => $comment['id'],
                'velemeny' => $comment['velemeny'],
                'datum' => $comment['datum'],
                'email' => $comment['email'],
                'felhasznalo_nev' => $user->bejelentkezes
            ];
            $view = new View_Loader($this->baseName.'_delete', $dataarray);
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