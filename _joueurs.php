<?php

include "includes/utile.inc.php";
include "includes/header.php";
include "includes/menu.php";

if (isset($_GET["agelimit"]))
	{
		$agelimit = $_GET["agelimit"];
		if(strlen($agelimit) > 2)
		{
			$aglimit = 35;
		}
	}


// Bibliotheque utilisée pour dialoguer à MySQL PDO
//connection à la base de donnée
$db = new PDO("mysql:host=localhost;dbname=Formation-POEC","root","");

//Preparation de la requete
if (isset($agelimit))
	{
		$query = $db->prepare('SELECT * FROM Joueur WHERE age < ' . $agelimit);
	}
	else
	{
		$query = $db->prepare('SELECT * FROM Joueur');
	}


//execution de la requete
$query->execute(); //Envoie vraie si reussie

//Recuperation de données
//$data = $query->fetchAll(); 

//var_dump($data);
//print_r($query);



?>

<h1>Joueurs</h1>
<label>Limite d'age</label>
<div>
	<form >
 	  <select name="agelimit">
   		<option value="25">25 ans</option>
   		<option value="24">24 ans</option>
   		<option value="30">30 ans</option>
   		<option value="29">29 ans</option>
  	 </select>
  	 <input type="submit"  value="valider">
  </form>
</div>

 <p>  <h5> Nombre de resultat </h5>  </p>

<?php

/*foreach ($data as $joueur) 
	{
		echo "<p>" . $joueur["prenom"] . " " . $joueur["nom"] . "</p>";
	}
*/
//variable compteur
	$i = 0;
while ($joueur = $query->fetch())
	{
		$i++;
		if ($joueur['numero_maillot'] > 0 && ($joueur['numero_maillot'] < 10000))
		{
			echo "<p>" . $joueur['prenom'] . " " . $joueur['nom'] ." " . " (" . 
			$joueur['numero_maillot'] . ")";
		}
		else
		{
			echo "<p>" . $joueur['prenom'] . " " . $joueur['nom']  . "" ;
		}

		echo('<a class="btn btn-primary btn-xs" href ="updatePlayer.php?id='.$joueur['id'].'" > Modifier </a>');
		echo(' ');
		echo('<a class="btn btn-danger btn-xs" href ="deletePlayer.php?id='.$joueur['id'].'" > Supprimer </a>');
		//echo("</p>");
	}

	echo  '<p>' .$i. '</p>';

?>


<?php  include "includes/footer.php" ?>