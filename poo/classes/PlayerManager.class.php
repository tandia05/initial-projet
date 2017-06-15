
<?php
include_once 'Player.class.php';

class PlayerManager
{
	public $db;

	function __construct()
	{
		$this->db = new PDO("mysql:host=localhost;dbname=Formation-POEC","root","");
	}

	function getList()
	{
		$query = $this->db->prepare('SELECT * FROM Joueur');
		$query->execute();
		return $query;// envoit le etour SQL sans fetch
	}

	function getListFiterByAge($agelimit)
	{
		$query = $this->db->prepare('SELECT * FROM Joueur WHERE age < ' . $agelimit);
		$query->execute();
		return $query;// envoit le etour SQL sans fetch
	}

	function getListFetched()
	{
		$query = $this->db->prepare('SELECT * FROM Joueur');
		$query->execute();
		return $query->fetchAll();// renvoit un tableay associatif
	}

	function getListFromAjax()
	{
		$query = $this->db ->prepare('
				SELECT 
						joueur.id,
						joueur.nom,
						joueur.prenom,
						joueur.age,
						joueur.equipe,
						joueur.numero_maillot,
						equipe.logo AS equipe_logo,
						equipe.nom AS equipe_nom
						FROM joueur
						LEFT JOIN equipe
						ON joueur.equipe = equipe.id
						ORDER BY joueur.nom  ASC , joueur.age ASC');
		$query->execute();
		$results = $query->fetchAll();

		//Modiication des données (majuscule)
		//avan l'envoi au client
		for ($i=0; $i < sizeof($results); $i++) 
		{ 
			$results[$i]['nom'] = ucfirst($results[$i]['nom']); //premiere lettre en majiscule
			$results[$i]['nom'] = strtoupper($results[$i]['nom']);//tout en majiscule

			if($results[$i]['equipe'] == 0)
			{
				$results[$i]['equipe_logo'] = "img/logo/pole-emploi.jpg";
			}
		}
		return $results;

	}

	function getById($id)
	{
		$query = $this->db->prepare('SELECT * FROM Joueur WHERE id = :id');
		$query->execute(array(
			':id'	=>	$id 
			));
		//return $query->fetch(); //renvoit un tableau associatif

		$player = new Player($query->fetch());
		return $player;

	}


}


?>