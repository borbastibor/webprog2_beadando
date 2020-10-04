<?php
namespace controllers;

include_once('models/Hirek.php');
include_once('models/Felhasznalok.php');

use includes\classes\HirDTO;
use includes\Database;
use models\Hirek;
use models\Felhasznalok;

class RestController {

    private $newsModel;
    private $usersModel;

    public function __construct() {
        $this->newsModel = new Hirek(Database::getConnection());
        $this->usersModel = new Felhasznalok(Database::getConnection());
    }

    public function handler($param) {
        $result = '';
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $allnews = $this->newsModel->getAll();
                $result .= '<table style="border-collapse: collapse;"><tr><th></th><th>Cím</th><th>Hír</th><th>Dátum</th></tr>';
                foreach ($allnews as $news) {
                    $result .= '<tr><td>'.$news['id'].'</td><td>'.$news['cim'].'</td><td>'.$news['hir'].'</td><td>'.$news['datum'].'</td></tr>';
                }
                $result .= '</table>';
                break;
            
            case 'POST':
                $hirdto = new HirDTO();
                $hirdto->cim = $_POST['cim'];
                $hirdto->hir = $_POST['hir'];
                $hirdto->datum = $_POST['datum'];
                $user = $this->usersModel->getByUsername($_POST['username']);
                if ($user != null) {
                    $hirdto->felhasznalo_id = $user->felhasznalo_id;
                }
                if ($this->newsModel->insert($hirdto)) {
                    $result = 'Sikeres beszúrás!';
                } else {
                    $result = 'Sikertelen beszúrás!';
                }
                break;

            case 'PUT':
                $data = array();
				$incoming = file_get_contents("php://input");
                parse_str($incoming, $data);
                // update 
                break;

            case 'DELETE':
                // delete
                break;
        }
    }
}