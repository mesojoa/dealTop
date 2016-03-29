<?php
class Animal
{
	protected $_serialNumberArray = array();
	protected $_primeNumberArray = array();
	private $fileName;
	
	/**
	 * set default range as 10000 if no ranges passed
	 * use child class name as file name if no file name passed
	 *
	 * @param int $range
	 * @param string $fileName
	 */
	public function __construct($range=null,$fileName=null){		
		if( is_null($range) ) {
			$range = 10000;				
		}
		
		$this->generatePrimeNumber($range);
		$this->fileName = get_class($this);
	}
	
	/**
	 * Generate Serial Number from Prime Numbers
	 * Default serial number set to 100
	 *
	 */
	public function generateSerialNumber() {
		// array_rand will select number from array keys
		// do array_flip to switch key and value for array_rand			
		$this->_serialNumberArray = array_rand(array_flip($this->_primeNumberArray), 100);	
	}
	
	
	/**
	 * generate txt file and save the file under files/...
	 *
	 * @param string $fileName
	 * @param array $serialNumberArray
	 */
	public function saveFile($fileName=null, $serialNumberArray=null) {
		$fileName = is_null($fileName)? $this->fileName : $fileName;
		$serialNumberArray = is_null($serialNumberArray)? $this->_serialNumberArray : $serialNumberArray;		
		
		$myfile = fopen("../files/".$fileName.".txt", "w") or die("Unable to open file!");
		$txt = $fileName."#\t\t Serial#\r\n";
		fwrite($myfile, $txt);
		$count = 0;
		foreach ($serialNumberArray AS $serialNumber) {
			$count += 1;
			$txt = $count."\t\t ".$serialNumber."\r\n";
			fwrite($myfile, $txt);
		}
		fclose($myfile);
	}
	
	/**
	 * function to generate prime numbers
	 *
	 * @param int $range
	 */
	private function generatePrimeNumber($range) {
		$this->_primeNumberArray[] = 2; // 2 is only even number prime
		
		for( $i=3; $i <= $range; $i++ ) {
			if( $i%2 !=1  ) {
				continue;
			}
			$d = 3;
			$x = sqrt($i);
			while ($i % $d != 0 && $d < $x) {
				$d += 2;
			}
			
			if((($i % $d == 0 && $i != $d) * 1) == 0) {
				$this->_primeNumberArray[] = $i;
			}			
		}	
	}	
}