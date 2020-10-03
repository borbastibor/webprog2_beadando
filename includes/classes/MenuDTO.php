<?php
namespace includes\classes;

include_once('includes/classes/AbstractDTO.php');

class MenuDTO extends AbstractDTO {

    public $id;
    public $url;
    public $nev;
    public $szulo;
    public $sorrend;
    public $jog_szint;

    public function setValues($valuearray) {
        $this->id = $valuearray['id'];
        $this->url = $valuearray['url'];
        $this->nev = $valuearray['nev'];
        $this->szulo = $valuearray['szulo'];
        $this->sorrend = $valuearray['sorrend'];
        $this->jog_szint = $valuearray['jog_szint'];
    }

}