<?php
namespace models;

include_once('includes/classes/AbstractModel.php');
include_once('includes/classes/JogosultsagDTO.php');

use includes\classes\JogosultsagDTO;
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
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'includes\classes\JogosultsagDTO');

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

    public function isNameInRights($name) {
        $stmt = $this->dbconnection->prepare("SELECT count(*) FROM jogosultsagok WHERE jog_nev = :jnev");
        $stmt->execute([':jnev' => $name]);
        $result = $stmt->fetchcolumn();

        if ($result != 0) {
            return true;
        }

        return false;
    }

    public function isLevelInRights($level) {
        $stmt = $this->dbconnection->prepare("SELECT count(*) FROM jogosultsagok WHERE jog_szint = :jszint");
        $stmt->execute([':jszint' => $level]);
        $result = $stmt->fetchcolumn();

        if ($result != 0) {
            return true;
        }

        return false;
    }

    public function insert($jogosultsag) {
        $stmt = $this->dbconnection->prepare("INSERT INTO jogosultsagok (jog_nev, jog_szint) VALUES (:jnev, :jszint)");
        $stmt->execute([
            ':jnev' => $jogosultsag->jog_nev,
            ':jszint' => $jogosultsag->jog_szint
        ]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

    public function update($jogosultsag) {
        $stmt = $this->dbconnection->prepare("UPDATE jogosultsagok SET jog_nev=:jnev, jog_szint=:jszint WHERE id=:id");
        $stmt->execute([':jnev' => $jogosultsag->jog_nev, ':jszint' => $jogosultsag->jog_szint, ':id' => $jogosultsag->id]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

    public function delete($id) {
        $stmt = $this->dbconnection->prepare("DELETE FROM jogosultsagok WHERE id = :id");
        $stmt->execute([':id' => $id]);

        if (!$stmt->rowCount()) {
            return false;
        }

        return true;
    }

}