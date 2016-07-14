<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/14 0014
 * Time: 下午 11:33
 */
class Collection implements  Iterator
{
	protected $_members = array();
	protected $_keys = array();
	protected $position = 0;

	public function __construct()
	{
		$this->position = 0;
		$this->_members = array();
		$this->_keys = array();
	}

	public function rewind()
	{
		// TODO: Implement rewind() method.

		$this->position = 0;
	}

	public function current()
	{
		// TODO: Implement current() method.
		return $this->_members[$this->position];

	}

	public function addItem($obj,$key=null){
		$this->_members[] = $obj;

		if(!$key){
			$key = sizeof($this->_members)-1;
		}
		$this->_keys[] = $key;
	}


	public function removeItem($key){
		$idx = -1;
		for($i=0;$i<=sizeof($this->_keys)-1;$i++){
			if($this->_keys[$i]==$key){
				$idx = $i;
			}
		}

		if($idx==-1){

			return false;
		}

		unset($this->_keys[$i]);

		if(isset($this->_members[$i])){
			unset($this->_members[$i]);
		}
	}

	public function key()
	{
		// TODO: Implement key() method.
		return $this->_keys[$this->position];
	}

	public function next()
	{
		++$this->position;
	}

	public function valid()
	{
		// TODO: Implement valid() method.
		return isset($this->_members[$this->position]);
	}

	public function length(){
		return sizeof($this->_members);
	}

	public function exists($key){

		$idx = -1;
		for($i=0;$i<=sizeof($this->_keys)-1;$i++){
			if($this->_keys[$i]==$key){
				$idx = $i;
			}
		}

		if($idx==-1){

			return false;
		}

		return isset($this->_members[$i]);
	}
}