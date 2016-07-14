<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/15 0015
 * Time: 上午 12:19
 */
class EmailCommunication extends Communication
{
	private $objApparentPrimaryRecipient; //to address
	private $arObjApparentSecondaryRecipients; //cc


	public function __construct()
	{
		$this->arRecipientCollection = new EmailRecipientCollection();
		$this->arObjApparentSecondaryRecipients = new EmailRecipientCollection();

		parent::__construct();
	}

	public function setPrimaryRecipient($objRecipient){
		if(!($this->arRecipientCollection->exists(
			$objRecipient->getStringRepresentation()))){
			parent::addRecipient($objRecipient);
		}
		$this->objApparentPrimaryRecipient = clone $objRecipient;
	}

	public function addCarbonRecipient($objRecipient){
		if(!($this->arRecipientCollection->exists(
			$objRecipient->getStringRepresentation()))){
			parent::addRecipient($objRecipient);
		}

		if(!($this->arObjApparentSecondaryRecipients->exists(
			$objRecipient->getStringRepresentation()))){
			$this->arObjApparentSecondaryRecipients->addItem(
				$objRecipient,$objRecipient->getStringRepresentation()
			);
		}
	}

	public function removeCarbonRecipient($objRecipient){
		if($this->arRecipientCollection->exists(
			$objRecipient->getStringRepresentation())){
			parent::removeRecipient($objRecipient);
		}

		if($this->arObjApparentSecondaryRecipients->exists(
			$objRecipient->getStringRepresentation())){
			$this->arObjApparentSecondaryRecipients->removeItem(
				$objRecipient->getStringRepresentation()
			);
		}
	}


	public function send()
	{
		foreach($this->arObjApparentSecondaryRecipients as $key=>$objrecipient){

			print "name:".$objrecipient->getRecipientName()."<br/>";
			print "address:".$objrecipient->getRecipientAddress()."<br/>";
		}


		print "name:".$this->objApparentPrimaryRecipient->getRecipientName()."<br/>";
		print "address:".$this->objApparentPrimaryRecipient->getRecipientAddress()."<br/>";
	}
}