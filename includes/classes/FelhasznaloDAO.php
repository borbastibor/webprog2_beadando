<?php
namespace includes\classes;

include_once('includes/classes/AbstractDAO.php');

class FelhasznaloDAO extends AbstractDAO {

    public $id;
    public $csaladi_nev;
    public $utonev;
    public $bejelentkezes;
    public $jelszo;
    public $jog_id;

    public function setValues($valuearray) {
        $this->id = $valuearray['id'];
        $this->csaladi_nev = $valuearray['csaladi_nev'];
        $this->utonev = $valuearray['utonev'];
        $this->bejelentkezes = $valuearray['bejelentkezes'];
        $this->jelszo = $valuearray['jelszo'];
        $this->jog_id = $valuearray['jog_id'];
    }

}