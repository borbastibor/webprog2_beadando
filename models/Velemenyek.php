<?php
namespace models;

include_once('includes/classes/AbstractModel.php');
include_once('includes/classes/VelemenyDTO.php');

use includes\classes\VelemenyDTO;
use includes\classes\AbstractModel;
use \PDO;

class Velemenyek extends AbstractModel {

    private $dbconnection;

    public function __construct($dbconnection) {
        $this->dbconnection = $dbconnection;
    }

    public function getAll() {
        $stmt = $this->dbconnection->prepare("SELECT * FROM velemenyek");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result ?? null;
    }

    public function getById($id) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM velemenyek WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?? null;
    }

    public function getByUser($userid) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM velemenyek WHERE felhasznalo_id = :uid");
        $stmt->execute([':uid' => $userid]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\VelemenyDTO');

        return $result[0] ?? null;
    }

    public function insert($velemeny) {
        $stmt = $this->dbconnection->prepare("INSERT INTO velemenyek (velemeny, datum, email, felhasznalo_id) VALUES (:comment, :datum, :email, :userid)");
        $stmt->execute([
            ':comment' => $velemeny->velemeny,
            ':datum' => $velemeny->datum,
            ':email' => $velemeny->email,
            ':userid' => $velemeny->felhasznalo_id
        ]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

    public function update($velemeny) {
        $stmt = $this->dbconnection->prepare("UPDATE velemenyek SET velemeny=:velemeny, datum=:datum, email=:email, felhasznalo_id=:userid WHERE id=:id");
        $stmt->execute([
            ':velemeny' => $velemeny->velemeny,
            ':datum' => $velemeny->datum,
            ':email' => $velemeny->email,
            ':userid' => $velemeny->felhasznalo_id,
            ':id' => $velemeny->id
        ]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

    public function delete($id) {
        $stmt = $this->dbconnection->prepare("DELETE FROM velemenyek WHERE id = :id");
        $stmt->execute([':id' => $id]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

}