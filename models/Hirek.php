<?php
namespace models;

include_once('includes/classes/AbstractModel.php');
include_once('includes/classes/HirDAO.php');

use includes\classes\HirDAO;
use includes\classes\AbstractModel;
use \PDO;

class Hirek extends AbstractModel {

    private $dbconnection;

    public function __construct($dbconnection) {
        $this->dbconnection = $dbconnection;
    }

    public function getAll() {
        $stmt = $this->dbconnection->prepare("SELECT * FROM hirek");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result ?? null;
    }

    public function getById($id) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM hirek WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?? null;
    }

    public function getByUser($userid) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM hirek WHERE felhasznalo_id = :uid");
        $stmt->execute([':uid' => $userid]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\HirDAO');

        return $result[0] ?? null;
    }

    public function insert($hir) {
        $stmt = $this->dbconnection->prepare("INSERT INTO hirek (cim, hir, datum, felhasznalo_id) VALUES (:title, :news, :newsdate, :userid)");
        $stmt->execute([
            ':title' => $hir->cim,
            ':news' => $hir->hir,
            ':newsdate' => $hir->datum,
            ':userid' => $hir->felhasznalo_id
        ]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

    public function update($hir) {
        $stmt = $this->dbconnection->prepare("UPDATE hirek SET cim=:title, hir=:news, datum=:newsdate, felhasznalo_id=:userid WHERE id=:id");
        $stmt->execute([
            ':title' => $hir->cim,
            ':news' => $hir->hir,
            ':newsdate' => $hir->datum,
            ':userid' => $hir->felhasznalo_id,
            ':id' => $hir->id
        ]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

    public function delete($id) {
        $stmt = $this->dbconnection->prepare("DELETE FROM hirek WHERE id = :id");
        $stmt->execute([':id' => $id]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

}