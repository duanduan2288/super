<?php
	require_once(__DIR__ .DIRECTORY_SEPARATOR ."autoload.php");

	$logger = Logger::getInstance();
	$logger->logMessage("duan");

	try{
		$client = new SoapClient("http://super.com/OssUpload.wsdl",array('cache_wsdl' => WSDL_CACHE_NONE));
		$aa = $client->__call("uploadFile",[new SoapParam("duan","name")]);

		var_dump($aa);die;
	}catch (SoapFault $e){
		var_dump($e->getMessage());
	}
//$wsdl = new SoapDiscovery();
//$aa = $wsdl->getWSDL("OssUpload","http://super.com/soap.php");
//var_dump($aa);die;
