<?php

class Velemeny extends AbstarctDAO {

    public $id = 0;
    public $velemeny = '';
    public $nev = '';
    public $datum = null;
    public $email = '';

    public function setValues($valuesarray) {
        $this->id = $valuesarray['id'];
        $this->velemeny = $valuesarray['velemeny'];
        $this->nev = $valuesarray['nev'];
        $this->datum = $valuesarray['datum'];
        $this->email = $valuesarray['email'];
    }

}