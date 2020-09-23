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
        if (!$felhasznalo instanceof FelhasznaloDAO) {
            return false;
        }

        $stmt = $this->dbconnection->prepare("INSERT INTO felhasznalok (csaladi_nev, utonev, bejelentkezes, jelszo, jog_id) VALUES (:csnev, :unev, :benev, :jelszo, :jid)");
        return $stmt->execute([':csnev' => $felhasznalo->csaladi_nev, ':unev' => $felhasznalo->utonev, ':benev' => $felhasznalo->bejelentkezes, ':jelszo' => $felhasznalo->jelszo, ':jid' => $felhasznalo->jog_id]);
    }

    public function update($felhasznalo) {
        //TODO
    }

    public function delete($id) {
        //TODO
    }

}