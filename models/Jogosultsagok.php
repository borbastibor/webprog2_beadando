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
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result ?? null;
    }

    public function getById($id) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM jogosultsagok WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?? null;
    }

    public function getByLevel($level) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM jogosultsagok WHERE jog_szint = :level");
        $stmt->execute([':level' => $level]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\JogosultsagDAO');

        return $result[0] ?? null;
    }

    public function getIdByLevel($level) {
        $stmt = $this->dbconnection->prepare("SELECT id FROM jogosultsagok WHERE jog_szint = :level");
        $stmt->execute([':level' => $level]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['id'] ?? null;
    }

    public function getLevelById($id) {
        $stmt = $this->dbconnection->prepare("SELECT jog_szint FROM jogosultsagok WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['jog_szint'] ?? null;
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