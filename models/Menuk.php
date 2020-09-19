<?php
include_once('includes/classes/MenuDAO.php');
include_once('includes/classes/AbstractModel.php');

class Menuk extends AbstractModel {

    private $dbconnection;

    public function __construct($dbconnection) {
        $this->dbconnection = $dbconnection;
    }

    public function getAll(): array {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'MenuDAO');
        return $result;
    }

    public function getById($id): MenuDAO {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, 'MenuDAO');
        return $result[0];
    }

    public function getByName($name): MenuDAO {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu WHERE nev = :name");
        $stmt->execute([':name' => $name]);
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, 'MenuDAO');
        return $result[0];
    }

    public function getByParentName($parentname): array {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu WHERE szulo = :parentname");
        $stmt->execute([':parentname' => $parentname]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'MenuDAO');
        return $result;
    }

    public function getByRightId($rightid): array {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu WHERE jog_id = :rightid");
        $stmt->execute([':rightid' => $rightid]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'MenuDAO');
        return $result;
    }

    public function insert($menu) {
        //TODO
    }

    public function update($menu) {
        //TODO
    }

    public function delete($id) {
        //TODO
    }

}