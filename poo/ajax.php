<?php
include 'classes/PlayerManager.class.php';
include_once 'classes/Player.class.php';
// Poin d'entrée (entry point ) des requetes ajax envoyées par la client


if(empty($_POST))
{
		switch ($_GET['action']) 
		{
			case 'list':
				$pm = new PlayerManager();
				$pm->getListFetched();
				echo json_encode($pm->getListFromAjax());
				break;

			case 'delete':
				$pm = new PlayerManager();
				if($pm->getById($_GET['id'])->delete())
				{
					echo 'Joueur supprimé';
				}
				else
				{
					echo 'La tentative de suppression a echoué';
				}
				break;
			
			default:
				echo 'Action non reconu';
				break;
		}

	
}
else
{
	echo 'requete POST';
}

?>