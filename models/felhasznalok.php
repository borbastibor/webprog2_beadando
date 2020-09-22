<?php
namespace models;

include_once('includes/classes/FelhasznaloDAO.php');
include_once('includes/classes/AbstractModel.php');

use includes\classes\AbstractModel;
use includes\classes\FelhasznaloDAO;
use \PDO;

class Felhasznalok extends AbstractModel {

    private $dbconnection;

    public function __construct($dbconnection) {
        $this->dbconnection = $dbconnection;
    }

    public function getAll() {
        $stmt = $this->dbconnection->prepare("SELECT * FROM felhasznalok");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\FelhasznaloDAO');
        if ($result == null) {
            return null;
        }
        return $result;
    }

    public function getById($id) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM felhasznalok WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\FelhasznaloDAO');
        if ($result == null) {
            return null;
        }
        return $result[0];
    }

    public function getByUsername($username) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM felhasznalok WHERE bejelentkezes = :username");
        $stmt->execute([':username' => $username]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\FelhasznaloDAO');
        if ($result == null) {
            return null;
        }
        return $result[0];
    }

    public function insert($felhasznalo) {
        //TODO
    }

    public function update($felhasznalo) {
        //TODO
    }

    public function delete($id) {
        //TODO
    }

}