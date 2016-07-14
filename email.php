<?php
	require_once(__DIR__ .DIRECTORY_SEPARATOR ."autoload.php");

	$objEmail = new EmailCommunication();
	$objEmailRecipient = new EmailRecipient("duan@126.com","duanduan");
	$objEmailCcRecipient = new EmailRecipient("duan2288@126.com","duan");

	$objEmail->setPrimaryRecipient($objEmailRecipient);
	$objEmail->addCarbonRecipient($objEmailCcRecipient);
	$objEmail->send();