<?php

function echop($str) {
	echo '<p>'.$str.'</p>';
}

function isFormatAllowed($format)
{
	$isAllowed = false ;
	//Foma de ficjier autorisé
	$formats_allowed = [".png", ".jpg", ".gif"];
	foreach ($formats_allowed as $format_allowed) 
	{
		if($format_allowed == $format)
			$isAllowed = true ;
	}
	return $isAllowed;
}

function rightFormat($str)
{
	$newFomat = ' ';
	// Suppression des espaces en debut et fin  de chaine
	$newFomat = trim($str);
	//Passage a la minuscule
	$newFomat = strtolower($newFomat);
	//
	$newFomat = str_replace(' ', '-', $newFomat);
	return $newFomat;
}
?>