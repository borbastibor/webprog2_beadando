<?php
namespace controllers;

include_once('models/Hirek.php');
include_once('models/Velemenyek.php');

use includes\Database;
use models\Velemenyek;
use models\Hirek;

class SoapController {

    private $newsModel;
    private $commentsModel;

    public function __construct() {
        $this->newsModel = new Hirek(Database::getConnection());
        $this->commentsModel = new Velemenyek(Database::getConnection());
    }

    public function getNews() {
        return $this->newsModel->getAll();
    }

    public function getComments() {
        return $this->commentsModel->getAll();
    }
}