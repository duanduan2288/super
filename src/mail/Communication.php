<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/14 0014
 * Time: 下午 11:55
 */
abstract class Communication
{
	protected $arRecipientCollection;
	private $strMessage;
	protected $strErrorMessage;
	protected $errorCode;

	abstract public function send();

	public function __construct()
	{
		$this->strMessage = "";
	}

	public function addRecipient($objRecipient,$strIdentifier=""){
		$srtRecipient = $objRecipient->getStringRepresentation();
		if(!$strIdentifier){
			 $strIdentifier = $srtRecipient;
		}
		$this->arRecipientCollection->addItem($objRecipient,$strIdentifier);
	}

	public function removeRecipient($strIdentifier){
		$this->arRecipientCollection->removeItem($strIdentifier);
	}

	protected function _setMessage($strMessage){
		$this->strMessage = $strMessage;
	}

	protected function _getMessage(){
		return $this->strMessage;
	}

	public function getErrorMessage(){
		return $this->strErrorMessage;
	}

	public function getErrorCode(){
		return $this->errorCode;
	}
}