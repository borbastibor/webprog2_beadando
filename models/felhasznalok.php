<?php
include_once('includes/classes/FelhasznaloDAO.php');
include_once('includes/classes/AbstractModel.php');

class Felhasznalok extends AbstractModel {

    private $dbconnection;

    public function __construct($dbconnection) {
        $this->dbconnection = $dbconnection;
    }

    public function getAll(): array {
        $stmt = $this->dbconnection->prepare("SELECT * FROM felhasznalok");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'FelhasznaloDAO');
        return $result;
    }

    public function getById($id): FelhasznaloDAO {
        $stmt = $this->dbconnection->prepare("SELECT * FROM felhasznalok WHERE id = $id");
        $stmt->execute();
        $result = new FelhasznaloDAO();
        $result->setValues($stmt->setFetchMode(PDO::FETCH_ASSOC));
        return $result;
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