<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/14
 * Time: 9:49
 */
class OssUpload
{
	/**
	 * @soap
	 * @param string $data
	 * @return string
	 */
	public function uploadFile($data){
		return $data;
	}

	/**
	 * @soap
	 * @param string $name
	 * @return string mixed
	 */
	public function getName($name){
		return $name;
	}
}