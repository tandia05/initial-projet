<?php

class Player
{
	public $db;

	public $id; // necessaire pu suppression et mis à jour
	public $nom;
	public $prenom;
	public $age;
	public $numero_maillot;
	public $equipe;

	function __construct($data)
	{
		$this->db = new PDO("mysql:host=localhost;dbname=Formation-POEC","root","");

		if(isset($data['id']))
		{
			$this->id = $data['id'];
		}

		$this->nom 				= $data['nom'];
		$this->prenom			= $data['prenom'];
		$this->age 				= $data['age'];
		$this->numero_maillot	= $data['numero_maillot'];
		$this->equipe 			= $data['equipe'];
	}

	function save()
	{
		$query = $this->db->prepare('
		INSERT INTO joueur (nom, prenom, age, numero_maillot, equipe) 
		VALUES (:nom, :prenom, :age, :numero_maillot, :equipe)
							');

		return  $query->execute(array(
			':nom' 				=> 	$this->nom,
			':prenom' 			=>  $this->prenom,
			':age'				=>  $this->age,
			':numero_maillot'	=>  $this->numero_maillot,
			':equipe' 			=>  $this->equipe
			));
	}

	function update()
	{
		$query = $this->db->prepare('
			UPDATE joueur 
			SET prenom = :prenom, nom = :nom, age = :age, numero_maillot = :numero_maillot, equipe = :equipe 
			WHERE id = :id'
		);
			
			return $query->execute( array(
				':prenom' 			=>	$this->prenom,
				':nom' 				=> 	$this->nom,
				':age' 				=>	$this->age,
				':numero_maillot' 	=> 	$this->numero_maillot,
				':equipe' 			=> 	$this->equipe,
				':id'				=> 	$this->id
				));
	}

	function delete()
	{
		$query = $this->db->prepare('DELETE FROM joueur WHERE id = :id');
		return $query->execute( array('id'=> $this->id ));
		
	}
}

?>