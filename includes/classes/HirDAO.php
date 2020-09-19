<?php
include_once('includes/classes/AbstractDAO.php');

class HirDAO {

    public $id;
    public $hir;
    public $felhasznalo_id;
    public $datum;

    public function setValues($valuesarray) {
        $this->id = $valuesarray['id'] ?? FALSE;
        $this->hir = $valuesarray['hir'] ?? FALSE;
        $this->felhasznalo_id = $valuesarray['felhasznalo_id'] ?? FALSE;
        $this->datum = $valuesarray['datum'] ?? FALSE;
    }

}