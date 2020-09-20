<?php
namespace models;

//include_once('includes/classes/AbstractModel.php');
include_once('includes/classes/JogosultsagDAO.php');

use includes\classes\JogosultsagDAO;
use includes\classes\AbstractModel;
use \PDO;

class Jogosultsagok extends AbstractModel {

private $dbconnection;

public function __construct($dbconnection) {
    $this->dbconnection = $dbconnection;
}

public function getAll(): array {
    $stmt = $this->dbconnection->prepare("SELECT * FROM jogosultsagok");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\JogosultsagDAO');
    return $result;
}

public function getById($id): JogosultsagDAO {
    $stmt = $this->dbconnection->prepare("SELECT * FROM jogosultsagok WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $result = $stmt->setFetchMode(PDO::FETCH_CLASS, 'includes\classes\JogosultsagDAO');
    return $result[0];
}

public function getByRightLevel($level): JogosultsagDAO {
    $stmt = $this->dbconnection->prepare("SELECT * FROM jogosultsagok WHERE jog_szint = :level");
    $stmt->execute([':level' => $level]);
    $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\JogosultsagDAO');
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