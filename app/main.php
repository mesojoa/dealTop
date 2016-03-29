<?php
function __autoload($class_name) {
	require_once $class_name.'.php';
}

if( $_POST['generate'] ) {
	$html = '<ul class="list-group">';
	// generate serial numbers for Goat
	$goat = new Goat();
	$goatSerialNumber = $goat->getSerialNumber();
	$goat->saveFile();
	$html .= '<li><a href="files/goat.txt" download="goat.txt">Click to download Goat Serial numbers</a></li>';
	
	$sheep = new Sheep();
	$sheepSerialNumber = $sheep->getSerialNumber();
	$sheep->saveFile();
	$html .= '<li><a href="files/sheep.txt" download="sheep.txt">Click to download Sheep Serial numbers</a></li>';

	$soulMates = array_intersect($goatSerialNumber,$sheepSerialNumber);
	$animal = new Animal();
	$animal->saveFile('soulmates',$soulMates);
	$html .= '<li><a href="files/soulmates.txt" download>Click to download Soulmates Serial numbers</a></li>';

	$html .= "<hr>";
	$html .= "<li>Sum of Goat Serial Numbers: ".array_sum($goatSerialNumber)."</li>";
	$html .= "<li>Average of Goat Serial Numbers: ".array_sum($goatSerialNumber)/count($goatSerialNumber)."</li>";
	$html .= "<li>Min serial number of Goat is ".min($goatSerialNumber)." and Max serial number of Goat is ".max($goatSerialNumber)."</li>";
	$html .= "<hr>";
	$html .= "<li>Sum of Sheep Serial Numbers: ".array_sum($sheepSerialNumber)."</li>";
	$html .= "<li>Average of Sheep Serial Numbers: ".array_sum($sheepSerialNumber)/count($sheepSerialNumber)."</li>";
	$html .= "<li>Min serial number of Sheep is ".min($sheepSerialNumber)." and Max serial number of Sheep is ".max($sheepSerialNumber)."</li>";
	$html .= "<hr>";
	$html .= "<li>Number of Soulmates: ".count($soulMates)."</li>";
	$html .= "<li>Sum of Soulmate Serial Numbers: ".array_sum($soulMates)."</li>";
	$html .= "<li>Average of Soulmate Serial Numbers: ".array_sum($soulMates)/count($soulMates)."</li>";
	$html .= "<li>Min serial number of Soulmate is ".min($soulMates)." and Max serial number of Soulmate is ".max($soulMates)."</li>";

	$html .= '</ul>';
	echo $html;	
}




 