<?php

namespace webprog\includes\classes;

class FelhasznaloDAO extends AbstractDAO {

    public $id = 0;
    public $csaladi_nev = '';
    public $utonev = '';
    public $bejelentkezes = '';
    public $jelszo = '';
    public $jog_id = 0;

    public function setValues($valuearray) {
        $this->id = $valuearray['id'];
        $this->csaladi_nev = $valuearray['csaladi_nev'];
        $this->utonev = $valuearray['utonev'];
        $this->bejelentkezes = $valuearray['bejelentkezes'];
        $this->jelszo = $valuearray['jelszo'];
        $this->jog_id = $valuearray['jog_id'];
    }

}