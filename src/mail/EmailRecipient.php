<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/14 0014
 * Time: 下午 11:13
 */
class EmailRecipient implements Recipient
{
	private $recipient_name;
	private $recipient_address;

	public function __construct($recipient_name = "",$recipient_address = "")
	{
		$this->recipient_address = $recipient_address;
		$this->recipient_name = $recipient_name;
	}

	public function setRecipientName($recipient_name){
		$this->recipient_name = $recipient_name;
	}

	public function setRecipientAddress($recipient_address){
		$this->recipient_address = $recipient_address;
	}

	public function getRecipientName(){

		return $this->recipient_name;
	}

	public function getRecipientAddress(){

		return $this->recipient_address;
	}

	public function isValid()
	{
		// TODO: Implement isValid() method.
		if(preg_match("/[\<\>\r\n]{1,}/",$this->recipient_name)){
			return false;
		}
		if(preg_match("/^([A-Z0-9._%-]+)(\@)([A-Z0-9._%-])(\.)([A-Z0-9._%-]{2,4})$/i/",$this->recipient_address)){
			return true;
		}else{
			return false;
		}
	}

	public function getStringRepresentation()
	{
		// TODO: Implement getStringRepresentation() method.
		$stringRepresentation = "";
		if(!empty($this->recipient_name)){
			$stringRepresentation.= $this->recipient_name;
		}

		$stringRepresentation.="<{$this->recipient_address}>";

		return $stringRepresentation;

	}
}