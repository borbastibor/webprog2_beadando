<?php
namespace controllers;

include_once('includes/View_Loader.php');

use includes\View_Loader;

class ErrorController {

	public $baseName = 'error';

	public function error($param) {
		$pArray = $this->getParamArray($param);

		switch ($pArray['code']) {
			case '404':
				$view = new View_Loader($this->baseName, '404');
				break;

			case 'auth':
				$view = new View_Loader($this->baseName, 'auth');
				break;
		}
		
	}

	private function getParamArray($param) {
        $parray = explode('?', $param);
        $earray = array_pop($parray);
        $farray = explode('=', $earray);
        $result[$farray[0]] = $farray[1];

        return $result;
    }
}
