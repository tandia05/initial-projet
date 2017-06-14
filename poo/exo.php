<?php
include 'classes/Math.class.php';

function add($nb1, $nb2)
{
	return $nb1 + $nb2;
}

function multiply($nb1, $nb2)
{
	return $nb1 * $nb2;
}
echo add(4, 12) . '<br>'.'' . multiply(3, 15).'<br>';

//******EXERCICE ********
	//Creer une classe Maths avec les carracteristiques suivantes
	//-constructeur recevant deux parametres (valeus numerique)
	 // propririeté: nb1, nb2
	//  methode: add et multiply
	//  Les methodes renveront l'addition ou le produit
	//  des deux proprietes de cette classe

$math = new Maths(12, 2);
echo  $math->add() . '<br>' . $math->multiply() .'<br>';
echo $math->substract(90, 60) .''. $math->substract(0, 20) .'<br>';

?>