<?php
include 'classes/PlayerManager.class.php';
include_once 'classes/Player.class.php';
// Point d'entrée (entry point ) des requetes ajax envoyées par la client

$req_method = $_SERVER['REQUEST_METHOD']; // renvoi le nom de la requete HTTP 
//utilisé par la requete du client


	if($req_method == 'GET') //requete en GET
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
	else if ($req_method == 'POST')
	 {
	 	// PHP ne recupere pas  les données  postées par le clien dans la super lobale POST
	 	// si la requete  POST EST AFFECT2 EN ajax
	 	// Par defau, json_encode convertit la chaine JSON en objet
	 	// Le parametre £assoc = trur permet de d'obtenir un tableau  assoiati au lieu de tableau
	 	$data = json_decode(file_get_contents('php://input'), $assoc = true); // renvoie les données postées 
	 	//par le clien dans une requee ajax
	 	echo $data->player;
	 	/*echo json_encode($data->player);*/
	 	$player = new Player($data['player']);

	 	if ($player->id)
	 	{
	 		if ($player->update())// Aucun Id defin => insertion
	 		{
	 			echo 'Joueur mis à jour';
	 		}
	 		else
	 		{
	 			echo 'La mise à jour a echoue';
	 		}
	 	}
	 	else
	 	{
	 		if ($player->save())
		 	{
		 		echo 'Joueur enregistré';
		 	}
		 	else
		 	{
		 		echo 'Enregistrment echoué';
		 	}
	 	}

	 		
	 	/*if ($player->save())
	 	{
	 		echo 'Joueur enregistré';
	 	}
	 	else
	 	{
	 		echo 'Enregistrement a échoué';
	 	}*/
		
	 }
	 else
	 {
		echo 'methode HTTP non utilisé';
	 }	 

?>