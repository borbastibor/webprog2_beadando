<?php
namespace models;

include_once('includes/classes/AbstractModel.php');
include_once('includes/classes/JogosultsagDAO.php');

use includes\classes\JogosultsagDAO;
use includes\classes\AbstractModel;
use \PDO;

class Jogosultsagok extends AbstractModel {

    private $dbconnection;

    public function __construct($dbconnection) {
        $this->dbconnection = $dbconnection;
    }

    public function getAll() {
        $stmt = $this->dbconnection->prepare("SELECT * FROM jogosultsagok");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\JogosultsagDAO');

        if ($result == null) {
            return null;
        }

        return $result;
    }

    public function getById($id) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM jogosultsagok WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, 'includes\classes\JogosultsagDAO');

        if ($result == null) {
            return null;
        }

        return $result[0];
    }

    public function getByLevel($level) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM jogosultsagok WHERE jog_szint = :level");
        $stmt->execute([':level' => $level]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\JogosultsagDAO');

        if ($result == null) {
            return null;
        }

        return $result[0];
    }

    public function getIdByLevel($level) {
        $stmt = $this->dbconnection->prepare("SELECT id FROM jogosultsagok WHERE jog_szint = :level");
        $stmt->execute([':level' => $level]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == null) {
            return null;
        }

        return $result['id'];
    }

    public function getLevelById($id) {
        $stmt = $this->dbconnection->prepare("SELECT jog_szint FROM jogosultsagok WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == null) {
            return null;
        }

        return $result['jog_szint'];
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