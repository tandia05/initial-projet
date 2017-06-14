<?php
include_once "includes/connexion_db.php";
connect();
include "includes/utile.inc.php";
include "includes/equipe.inc.php";
include "includes/header.php";
include "includes/menu.php";

/*recupreation de l'id  du joueur*/
if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		// 1_connection
		$db = connect();
		// 2_requete
		$query = $db->prepare('SELECT * FROM joueur WHERE id = :id');
		// 3_ execution
		$query->execute( array('id'=> $id ));
		// 4_feth
		$joueur = $query->fetch();
		
	}

	//mis a jour de la table joueur
	if (isset($_POST['input']))
		{	// veification de la connection  a la bae
			if(!isset($db)) $db = connect();
			$query = $db->prepare('UPDATE joueur SET prenom =:prenom, nom =:nom,
			age =:age, numero_maillot = :numero_maillot,equipe = :equipe WHERE id = :id');
			
			$query->execute( array(':prenom' => 			$_POST['prenom'],
									':nom' => 				$_POST['nom'], 
									':age' =>	 			$_POST['age'],
									':numero_maillot' => 	$_POST['numero_maillot'],
									':equipe' => 			$_POST['equipe'],
									':id' => 				$_POST['id']
									));

			//redirection vers la liste des joueurs
			header('location:joueurs.php');
		}

?>

<h1>Mis à jour</h1>
<form action="" method="POST">
	<label>Nom</label>
	<input type="text" name="nom" value="<?php echo $joueur['nom'] ?>">

	<label>Prenom</label>
	<input type="text" name="prenom" value="<?php echo $joueur['prenom'] ?>">

	<label>Age</label>
	<input type="text" name="age" value="<?php echo $joueur['age'] ?>">

	<label>num_maillot</label>
	<!-- <input type="text" name="numero_maillot"> -->
	<select name="numero_maillot" >
		<?php
		for ($i=1; $i < 1000; $i++) 
		{ 
			if ($i == $joueur['numero_maillot'])
				{
					echo '<option selected value="'.$i.'">'.'numeo'.$i. '</option>';
				}
			else
				{
					echo '<option value="'.$i.'">'.'numeo'.$i. '</option>';
				}

		}
		?>
	</select>

	<label>equipe</label>
	
		<?php
		/*$teams = getTeams();*/
		echo selectFormatWithOpt(getTeams(), $joueur['equipe']);
		?>

	<input type="hidden" name="id" value="<?php echo $id ?>">

	<input type="submit" name="input" value="valider">
</form>




<?php  include "includes/footer.php" ?>