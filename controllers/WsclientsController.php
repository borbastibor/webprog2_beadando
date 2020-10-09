<?php
namespace controllers;

include_once('includes/View_Loader.php');

use includes\classes\Response;
use includes\View_Loader;
use SoapClient;
use SoapFault;

class WsclientsController {

	private $baseName = 'wsclients';
	private $soap_options = [
		'location' => 'http://localhost/soap/server.php', 
		'uri' => 'http://localhost/soap/server.php',
		'keep_alive' => false
	];
	private $restUrl = 'http://localhost/rest/server.php';

	public function soapClient() {
		$view = new View_Loader($this->baseName.'_soap');
	}

    public function restClient() {
		$ch = curl_init($this->restUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
        $view = new View_Loader($this->baseName.'_rest', $data);
	}
	
	public function soapRequest() {
		if (isset($_POST['soap_request'])) {
			try {
				$sclient = new SoapClient(null, $this->soap_options);
				switch ($_POST['datatype']) {
					case 'news':
						$data = $sclient->getNews();
						break;
					
					case 'comments':
						$data = $sclient->getComments();
						break;

					default:
						echo(json_encode(new Response(true, 'Hibás adattípus!')));
						break;
				}
				echo(json_encode(new Response(false, json_encode($data))));
			} catch (SoapFault $f) {
				echo(json_encode(new Response(true, $f->getMessage())));
			}
		} else {
			echo(json_encode(new Response(true, 'Hiba a kéréskor!')));
		}
	}

	public function restRequest() {
		switch (true) {
			case isset($_POST['rest_insert']):
				# code...
				break;
			
			case isset($_POST['rest_update']):
				# code...
				break;

			case isset($_POST['rest_delete']):
				# code...
				break;
		}
	}
	
}