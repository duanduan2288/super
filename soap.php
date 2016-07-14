<?php
require_once(__DIR__ .DIRECTORY_SEPARATOR ."autoload.php");

//,array("location"=>"http://super.com/soap.php","uri"=>"soap.php")
$soap = new SoapServer(null,array("location"=>"http://super.com/soap.php","uri"=>"soap.php"));
$soap->setClass("OssUpload");
$soap->handle();


function getName($data){

	return $data;
}

function getTitle($data){
	return $data;
}