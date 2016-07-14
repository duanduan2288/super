<?php
	require_once(__DIR__ .DIRECTORY_SEPARATOR ."autoload.php");

	$logger = Logger::getInstance();
	$logger->logMessage("duan");

	client();

	function client(){
		$client = new SoapClient(null,
				[
						'location'=>"http://www.super.com/soap.php",
						"uri"=>"http://www.super.com"
				]);
		$aa = $client->getParam();
		var_dump($aa);die;
	}