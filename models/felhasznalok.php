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
        $stmt = $this->dbconnection->prepare("SELECT * FROM felhasznalok WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, 'FelhasznaloDAO');
        return $result;
    }

    public function getByUsername($username): FelhasznaloDAO {
        $stmt = $this->dbconnection->prepare("SELECT * FROM felhasznalok WHERE bejelentkezes = :username");
        $stmt->execute([':username' => $username]);
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, 'FelhasznaloDAO');
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