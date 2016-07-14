<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/13 0013
 * Time: 下午 10:14
 */
class SoapService
{
	function __construct()
	{
		$server = new SoapServer(null,[
			'location'=>"http://super.com/mysoap.php",
			'uri'=>'http://super.com'
		]);

	}

	function client(){
		$client = new SoapClient("http://webservices.amazon.com/AWSECommerceService/AWSECommerecService.wsdl");
		$aa = $client->__getFunctions();
		var_dump($aa);die;
	}
}