<?php

namespace webprog\includes\classes;

class HirDAO {

    public $id = 0;
    public $hir = '';
    public $felhasznalo_id = 0;
    public $datum = null;

    public function setValues($valuesarray) {
        $this->id = $valuesarray['id'];
        $this->hir = $valuesarray['hir'];
        $this->felhasznalo_id = $valuesarray['felhasznalo_id'];
        $this->datum = $valuesarray['datum'];
    }

}