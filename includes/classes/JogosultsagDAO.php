<?php
namespace includes\classes;

include_once('includes/classes/AbstractDAO.php');

class JogosultsagDAO extends AbstractDAO {

    public $id;
    public $jog_nev;
    public $jog_szint;

    public function setValues($valuesarray) {
        $this->id = $valuesarray['id'];
        $this->jog_nev = $valuesarray['jog_nev'];
        $this->jog_szint = $valuesarray['jog_szint'];
    }

}