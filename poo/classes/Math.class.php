<?php

class Maths
{
	public $nb1;
	public $nb2;

	function __construct($nb1, $nb2)
	{
		$this->nb1 = $nb1;
		$this->nb2 = $nb2;
	}
	function add()
	{
		return $this->nb1 + $this->nb2;
	}
	function multiply()
	{
		return $this->nb1 * $this->nb2;
	}
	function substract($nb1, $nb2)
	{
		// return $his->nb1 - $this->nb2;
		// retourne le resulat de la soustraction
		return $nb1 - $nb2;
	}
}


?>