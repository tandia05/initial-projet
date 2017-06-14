<?php
include "includes/connexion_db.php";


/*recupreation de l'id  du joueur*/
if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		// 1_connection
		$db = connect();
		// 2_requete
		$query = $db->prepare('DELETE FROM joueur WHERE id = :id');
		// 3_ execution
		$query->execute( array('id'=> $id ));

		if(isset($_GET['ajax']))
		{
			echo " Le joueur d'id " . $id . "a été supprimé";
		}
		else
		{
			header('location:joueurs.php');
		}	
		
	}

?>



<?php  include "includes/footer.php" ?>