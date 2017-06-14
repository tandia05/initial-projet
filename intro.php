<?php

echo "Bonjour";
echo "<p> Au revoir</p>";
echo "<ul><li>Pomme</li>";
echo "<li>orange</li>";
echo "</ul><ul><li>mangue</li>";
echo "</ul>";

//VARIABLES
// En PHP on ne declare pas le type
$message = "Le PHP c'est ormidable";
echo $message;
$nb1 = 20000;
$nb2 = 2;
$resultat = $nb1 * $nb2 ;

//oncatenation
echo "<p>Le resultat est de   " . $resultat . "</p>";
echo "<p>" . $nb1 . ' * ' . $nb2 . ' = <strong> ' . $resultat . "</strong></p>" ;

// Structure conditionnel
//if
if ($nb1 > 10) {
	echo "I est vrai que   " . $nb1 . "  est supeieur à  10";
}
elseif ($nb1 == 10) {
	echo "I est vrai que   " . $nb1 . "  est egal à  10";
}
else {
	echo "I n'est pas vrai que  " . $nb1 . "  est supeieur à  10";
}

if ($nb1> 10000) {
	echo "<div> immense</div>";

}

$connected = false;
if ($connected) {echo "Vs etes connecté";}
if (! $connected) {echo "Vs n'estes pas connecté";}

?>