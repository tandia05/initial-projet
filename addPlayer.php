<?php
include "includes/utile.inc.php";
include "includes/equipe.inc.php";
include_once "includes/access.inc.php";
include "includes/header.php";
include "includes/menu.php";

if(isset($_POST['input']))
	{
		echo('Le client a valider le formulaire');
		$db = new PDO("mysql:host=localhost;dbname=Formation-POEC","root","");
		$query = $db->prepare(
			'INSERT INTO joueur (nom,prenom,age,numero_maillot,equipe) VALUES (:nom, :prenom, :age, :numero_maillot, :equipe)');
		$query->execute(array(
			'nom' => $_POST['nom'],
			'prenom' => $_POST['prenom'],
			'age' => $_POST['age'],
			'numero_maillot' => $_POST['numero_maillot'],
			'equipe' => $_POST['equipe']
			));
		

		header('location:joueurs.php');
	}
	else
	{
		//echo("Le client n'a  pas valider le formulaire");
	}

	// chargement des equipes

?>



<?php
/*if (isset($_SESSION['user']))
	{
		if($_SESSION['user']['role'] == 'admin' || 'client')
		{
			include 'includes/Forms/addTeam.inc.php';
		}
		else
		{
			echop('Droit insuffisant');
		}
	}
else
	{
		echop( "vous devez etre connecté pour acceder a cette page");
	}*/

if(isLogged())
{
	if(getRole() == 'admin' || 'client')
	{
		include 'includes/Forms/addPlayer.inc.php';
	}
	else
	{
		echop('Droits insuffisants');
	}
}
else
{
	echop('cous devez etre connecté pour acceder a ces ressources');
}

?>


<?php  include "includes/footer.php" ?>