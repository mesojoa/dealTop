<?php 
require_once 'animal.php';
class Goat extends Animal
{
	public function getSerialNumber() {
		$this->generateSerialNumber();
		return $this->_serialNumberArray;						
	}
}
