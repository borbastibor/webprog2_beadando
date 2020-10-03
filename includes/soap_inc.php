<?php

require_once('controllers/SoapController.php');

$options = array('uri' => SITE_ROOT.'soap/');
$soapserver = new SoapServer(null, $options);
$soapserver->setClass('SoapController');
$soapserver->handle();