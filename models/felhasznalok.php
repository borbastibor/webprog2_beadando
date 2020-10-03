<?php
namespace models;

include_once('includes/classes/FelhasznaloDTO.php');
include_once('includes/classes/AbstractModel.php');

use includes\classes\AbstractModel;
use includes\classes\FelhasznaloDTO;
use \PDO;

class Felhasznalok extends AbstractModel {

    private $dbconnection;

    public function __construct($dbconnection) {
        $this->dbconnection = $dbconnection;
    }

    public function getAll() {
        $stmt = $this->dbconnection->prepare("SELECT * FROM felhasznalok");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result ?? null;
    }

    public function getById($id) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM felhasznalok WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\FelhasznaloDTO');

        return $result[0] ?? null;
    }

    public function getByUsername($username) {
        $stmt = $this->dbconnection->prepare("SELECT * FROM felhasznalok WHERE bejelentkezes = :username");
        $stmt->execute([':username' => $username]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\FelhasznaloDTO');
       
        return $result[0] ?? null;
    }

    public function isUsernameInUsers($name) {
        $stmt = $this->dbconnection->prepare("SELECT count(*) FROM felhasznalok WHERE bejelentkezes = :unev");
        $stmt->execute([':unev' => $name]);
        $result = $stmt->fetchcolumn();

        if ($result != 0) {
            return true;
        }

        return false;
    }

    public function insert($felhasznalo) {
        if (!$felhasznalo instanceof FelhasznaloDTO) {
            return false;
        }

        $stmt = $this->dbconnection->prepare("INSERT INTO felhasznalok (csaladi_nev, utonev, bejelentkezes, jelszo, jog_id) VALUES (:csnev, :unev, :benev, :jelszo, :jid)");
        $stmt->execute([
            ':csnev' => $felhasznalo->csaladi_nev,
            ':unev' => $felhasznalo->utonev,
            ':benev' => $felhasznalo->bejelentkezes,
            ':jelszo' => $felhasznalo->jelszo,
            ':jid' => $felhasznalo->jog_id
        ]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

    public function update($felhasznalo) {
        if (!$felhasznalo instanceof FelhasznaloDTO) {
            return false;
        }

        $stmt = $this->dbconnection->prepare("UPDATE felhasznalok SET csaladi_nev=:csnev, utonev=:unev, bejelentkezes=:fnev, jelszo=:pswd, jog_id=:jid WHERE id=:id");
        $stmt->execute([
            ':csnev' => $felhasznalo->csaladi_nev,
            ':unev' => $felhasznalo->utonev,
            ':fnev' => $felhasznalo->bejelentkezes,
            ':pswd' => $felhasznalo->jelszo,
            ':jid' => $felhasznalo->jog_id,
            ':id' => $felhasznalo->id
        ]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

    public function delete($id) {
        $stmt = $this->dbconnection->prepare("DELETE FROM felhasznalok WHERE id = :id");
        $stmt->execute([':id' => $id]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

}