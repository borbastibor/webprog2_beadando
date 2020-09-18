<?php

namespace webprog\includes\classes;

class JogosultsagDAO {

    public $id = 0;
    public $jog_nev = '';
    public $jog_szint = 0;

    public function setValues($valuesarray) {
        $this->id = $valuesarray['id'];
        $this->jog_nev = $valuesarray['jog_nev'];
        $this->jog_szint = $valuesarray['jog_szint'];
    }

}