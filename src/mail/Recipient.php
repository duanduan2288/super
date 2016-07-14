<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/14 0014
 * Time: 下午 11:05
 */
interface Recipient
{
	public function isValid();
	public function getStringRepresentation();
}