<?php
//**********HERITAGE***************
include 'Player.class.php';

class Footballer extends Player
{
	private $salaire; // Propriete definie au niveau de la classe fille
	// cette ptopriete d'ajoute a celles de la class mere

	public function getSalaire()
	{
		return $this->salaire;
	}

	public function setSalaire($value)
	{
		 $this->salaire = $value;
	}

}

?>