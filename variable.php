<?php
include "includes/header.php";
include "includes/menu.php";

echo "Bonjour";
echo "<p> Au revoir</p>";
echo "<ul><li>Pomme</li>";
echo "<li>orange</li>";
echo "<li>mangue</li>";
echo "</ul>";

//VARIABLES
// En PHP on ne declare pas le type
//**** Les types simples
$message = "Le PHP c'est ormidable"; // string
echo $message;
$nb1 = -5; //number
$nb2 = 2;  //number
$resultat = $nb1 * $nb2 ;

$utilisateur =null; //null ideal comme valeur temporaire
//oncatenation
echo "<p>Le resultat est de   " . $resultat . "</p>";
echo "<p>" . $nb1 . ' * ' . $nb2 . ' = <strong> ' . $resultat . "</strong></p>" ;

//**** Les types complexes
// Tableau a indice numerique (premier element indexé a 0)

$nombres = [4,7,509,12];
$joueurs = ["panoucci","lama"];
$nix = ["buffon",1,true];
echo $nombres[3];

// Tableau associatif

$bonoucci1 = ["path" => "img/joueurs/bonoucci1.jpg",
			   "caption" => "bonoucci celebrant un but",
			   "alt" => "celebration"
];

$bonoucci2 = ["path" => "img/joueurs/bonoucci2.jpg",
			   "caption" => "bonoucci en rajeur",
			   "alt" => "rage"
];

$bonoucci3 = ["path" => "img/joueurs/bonoucci3.jpg",
			   "caption" => "en conference",
			   "alt" => "conference"
];

$joueur = ["nom" => "bonoucci",
			 "prenom" => "leonaro",
			 "ahe" => "29 ans",
			 "numero" => "19",
			 "club" => "juventus",
			 "international" => true,
			 "photos" => ["bonoucci1","bonoucci2","bonoucci3"],
			 "photos2" => [$bonoucci1,$bonoucci2,$bonoucci3]
];

echo "<p>" . $joueur ["club"] . "</p>";

/*foreach ($joueur["photos"] as $photos) 
{
	echo '<div><img src="img/joueurs/' .$photos.'.jpg"></div>';
}*/

echo "<table class=table table-striped>";

foreach ($joueur["photos2"] as $photo ) 
{
	echo "<tr>";
		echo '<td><img style="width:200px" src="'.$photo["path"].'"></td>';
		echo '<td>' . $photo["caption"] . '</td>';

	echo "</tr>";
}

echo "</table>";

include "includes/footer.php";
?>