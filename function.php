<?php
include "includes/header.php";
include "includes/menu.php";
//$allowed_tags = ['p','div','span','strong','em','h1','h2'];

/***FUNCTION ***/
//Declaration
function echop($str) {
	echo '<p>'.$str.'</p>';
}

function echot($str,$tag) 
{
	// function qui verifie la chaine en entré

	//verifie que la balise fait partie des tag autorisé
	
	
	
	if (isTagAllowed($tag)) 
	{
		echo '<'.$tag.'>'.$str.'</'.$tag.'>';
	}
	else
	 {
	 	echop('Balise non autorisé');
	}
}

function isTagAllowed($tag)
{
	$allowed_tags = ['p','div','span','strong','em','h1','h2'];
	$found_tag = false;
	foreach ($allowed_tags as $allowed ) 
  	{
		if($tag == $allowed)
		{
			$found_tag = true;
		}
	}
	return $found_tag;
}

//Invocation ou ammel


echo "Les functions sont utiles";
echo "Les functions sont utiles";
echo "Les functions sont utiles";

echop("Les functions sont utiles");
echop("Les functions sont utiles");
echop("Les functions sont utiles");

echot("Les functions sont utiles","div");
echot("Les functions sont utiles","p");
echot("Les functions sont utiles","span");

echot("Les functions sont utiles","nav");


include "includes/footer.php";
?>