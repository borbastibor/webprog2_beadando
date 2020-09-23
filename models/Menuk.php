<?php
namespace models;

include_once('includes/classes/AbstractModel.php');
include_once('includes/classes/MenuDAO.php');

use includes\classes\AbstractModel;
use includes\classes\MenuDAO;
use \PDO;

class Menuk extends AbstractModel {

    private $dbconnection;

    public function __construct($dbconnection) {
        $this->dbconnection = $dbconnection;
    }

    public function getAll() {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\MenuDAO');

        if ($result == null) {
            return null;
        }

        return $result;
    }

    public function getById($id) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, 'includes\classes\MenuDAO');

        if ($result == null) {
            return null;
        }

        return $result[0];
    }

    public function getByName($name) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu WHERE nev = :name");
        $stmt->execute([':name' => $name]);
        $result = $stmt->setFetchMode(PDO::FETCH_CLASS, 'includes\classes\MenuDAO');

        if ($result == null) {
            return null;
        }

        return $result[0];
    }

    public function getByParentName($parentname) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu WHERE szulo = :parentname");
        $stmt->execute([':parentname' => $parentname]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\MenuDAO');

        if ($result == null) {
            return null;
        }

        return $result;
    }

    public function getByRightLevel($rightlevel) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu WHERE jog_szint = :rightlevel");
        $stmt->execute([':rightlevel' => $rightlevel]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\MenuDAO');

        if ($result == null) {
            return null;
        }

        return $result;
    }

    public function getAllUpToLevel($level) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM menu WHERE jog_szint <= :level ORDER BY sorrend");
        $stmt->execute([':level' => $level]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\MenuDAO');

        if ($result == null) {
            return null;
        }

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