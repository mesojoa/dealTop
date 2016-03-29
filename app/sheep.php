<?php 
require_once 'animal.php';
class Sheep extends Animal
{
	public function getSerialNumber() {		
		$this->generateSerialNumber();
		return $this->_serialNumberArray;									
	}
}
