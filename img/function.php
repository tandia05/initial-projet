<?php
/***FUNCTION ***/
//Declaration
function echop($str) {
	echo '<p>'.$str.'</p>';
}

function echot($str) {
	echo '<p>'.$str.'</p>';
}

//Invocation ou ammel

echo "Les functions sont utiles";
echo "Les functions sont utiles";
echo "Les functions sont utiles";

echop("Les functions sont utiles");
echop("Les functions sont utiles");
echop("Les functions sont utiles");

echot("Les functions sont utiles","di");
echot("Les functions sont utiles","p");
echot("Les functions sont utiles","span");

?>