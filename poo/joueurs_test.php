
<?php
include 'classes/PlayerManager.class.php';
include_once 'classes/Player.class.php';

$pm = new PlayerManager();
$joueurs = $pm->getListFetched();
//var_dump($joueurs);

$donnees = [
		'nom'				=>	'Nedved',
		'prenom'			=>	'Pavel',
		'age'				=>	45,
		'numero_maillot'	=>	6,
		'equipe'			=>	1
];
$player = new Player($donnees);
/*if($player->save())
{
	echo 'Joueur enegistré en base';
}
else
{
	echo 'Nooooooooooooooh';
}*/

$player2 = $pm->getById(35);
//var_dump($player2);
$player2->numero_maillot = 10;

/*if($player2->update())
{
	echo 'Joueur mis à jour';
}
else
{
	echo 'albannnnnnnnnnn';
}
*/

if ($player3 = $pm->getById(39)->delete())
{
	echo 'joueur supprimé';
}
else
{
	echo 'Noooooooooo';
}




?>