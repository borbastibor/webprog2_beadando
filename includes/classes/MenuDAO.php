<?php
namespace includes\classes;

include_once('includes/classes/AbstractDAO.php');

class MenuDAO extends AbstractDAO {

    public $id;
    public $url;
    public $nev;
    public $szulo;
    public $sorrend;
    public $jog_id;

    public function setValues($valuearray) {
        $this->id = $valuearray['id'];
        $this->url = $valuearray['url'];
        $this->nev = $valuearray['nev'];
        $this->szulo = $valuearray['szulo'];
        $this->sorrend = $valuearray['sorrend'];
        $this->jog_id = $valuearray['jog_id'];
    }

}