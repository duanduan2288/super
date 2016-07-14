<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/13 0013
 * Time: 下午 10:52
 */
$server = new SoapServer(null,[
			"location"=>'http://www.super.com/soap.php',
			"uri"=>"http://www.super.com/"
]);

$server->addFunction("getParam");

function getParam(){
	return "aa";
}