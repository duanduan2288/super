<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/11 0011
 * Time: 下午 11:15
 */
class Config
{
	public static function getConfig(){
		return [
			"LOGGER_LEVEL"=>100,
			"LOGGER_FILE"=>"././logs/".date("Y-m-d").".log"
		];
	}
}