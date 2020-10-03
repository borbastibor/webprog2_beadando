<?php
namespace includes\classes;

class VelemenyDTO extends AbstractDTO {

    public $id;
    public $velemeny;
    public $felhasznalo_id;
    public $datum;
    public $email;

    public function setValues($valuesarray) {
        $this->id = $valuesarray['id'];
        $this->velemeny = $valuesarray['velemeny'];
        $this->nev = $valuesarray['felhasznalo_id'];
        $this->datum = $valuesarray['datum'];
        $this->email = $valuesarray['email'];
    }

}