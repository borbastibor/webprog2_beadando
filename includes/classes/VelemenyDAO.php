<?php
namespace includes\classes;

class Velemeny extends AbstractDAO {

    public $id;
    public $velemeny;
    public $nev;
    public $datum;
    public $email;

    public function setValues($valuesarray) {
        $this->id = $valuesarray['id'];
        $this->velemeny = $valuesarray['velemeny'];
        $this->nev = $valuesarray['nev'];
        $this->datum = $valuesarray['datum'];
        $this->email = $valuesarray['email'];
    }

}