<?php
namespace controllers;

include_once('models/Hirek.php');
include_once('models/Velemenyek.php');

use includes\Database;
use models\Velemenyek;
use models\Hirek;

class RestController {

    private $newsModel;
    private $commentsModel;

    public function __construct() {
        $this->newsModel = new Hirek(Database::getConnection());
        $this->commentsModel = new Velemenyek(Database::getConnection());
    }

    public function handler() {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                # code...
                break;
            
            case 'POST':
                # code...
                break;

            case 'PUT':
                # code...
                break;

            case 'DELETE':
                # code...
                break;
        }
    }
}