<?php
include "includes/header.php";
include "includes/menu.php";
//****Les boucles for
// for
for ($i=0; $i < 3; $i++) { 
	echo "<p>" . $i. "</p>";
}
// while
$i = 0;
while ($i < 3) {
	echo "<p>" . $i. "</p>";
	$i++;
}

// oreach 
//ideal pour parcourir un tableau
$months = ["janvier","fevier","mars","avril","mai"];
echo "<select>";
foreach ($months as $m) { // $m alias
	echo "<option>" . $m . "</option>";
}

for ($i=0; $i < 4; $i++) { 
	echo "<option>" . $mois[$i] . "</option>";
}


echo "</select>";

$animaux = ["lapin","lion","chat","puma","zebre"];
$width = 300;
$i = 1;
foreach ($animaux as $animal ) {
	echo "<div><img  style =\"width: ". $width . "px; border:2px red solid \" src=img/" . $animal .  " . jpg>";
}

echo "<script src=\"js/script.js\"></script>";
//EXO
//  2 autres photo 
// bodure 


include "includes/footer.php";
?>