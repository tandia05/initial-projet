<?php
include 'poo/classes/PlayerManager.class.php';

include "includes/equipe.inc.php";
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
/*$db = new PDO("mysql:host=localhost;dbname=Formation-POEC","root","");

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
$query->execute(); //Envoie vraie si reussie*/

//Recuperation de données
//$data = $query->fetchAll(); 

//var_dump($data);
//print_r($query);

$pm = new PlayerManager();

if (isset($agelimit))
{
	$query = $pm->getListFiterByAge($agelimit);
}
else
{
	$query = $pm->getList();
}


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


<?php

/*foreach ($data as $joueur) 
	{
		echo "<p>" . $joueur["prenom"] . " " . $joueur["nom"] . "</p>";
	}
*/
//variable compteur
	$output = '<div classe="equipe">';
	$i = 0;
	$output = '';
while ($joueur = $query->fetch())
	{
		$i++;
		if ($joueur['numero_maillot'] > 0 && 
			($joueur['numero_maillot'] < 10000))
		{
			$output .=  "<p>" . $joueur['prenom'] . " " . $joueur['nom'] ." " . " (" . 
			$joueur['numero_maillot'] . ")";
		}
		else
		{
			$output .=  "<p>" . $joueur['prenom'] . " " . $joueur['nom']  . "" ;
		}
		$team = getTeamById($joueur['equipe']);
		if ($team == false)
			{
				$output .= ',SCF';
			}
			else
			{
				//$output .= ', equipe : ' . $team['nom'];
				$output .= '<img src="' . $team['logo'] .'" width="40">';
				// var_dump($team['entraineur']);
			}
		//Afficher nom de l'equipe a droite des joueurs
		//$output .=', equipe :' . $joueur['equipe'];

		$output .= ('<a class="btn btn-primary btn-xs" href ="updatePlayer.php?id='.$joueur['id'].'" > Modifier </a>');
		$output .= (' ');
		$output .= ('<a class="btn btn-danger btn-xs" href ="deletePlayer.php?id='.$joueur['id'].'" > Supprimer </a>');
		//echo("</p>");
	}

	$output .= '</div>';

	echo '<p>  Nombre de resultat: ' . $i . '</p>';
	echo $output;

?>


<?php  include "includes/footer.php" ?>