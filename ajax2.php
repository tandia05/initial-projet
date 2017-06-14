<?php
include 'includes/connexion_db.php';
$db = connect();
/*$query = $db ->prepare('SELECT  joueur.nom,joueur.prenom,joueur.age,joueur.equipe,
						joueur.numero_maillot,equipe.nom AS equipe_nom
						FROM joueur,equipe
						WHERE joueur.equipe = equipe.id');*/

// INNER JOIN jointure interne restrictive elimine le lignes 
//qui n'ont pas de corespondance dans l'autre table

//LEFT JOIN jointure externe ouverte inclut des lignes n'ayant pas 
// de correspondance dans l'autre table (volonne manquante remplacé par NULL)
$query = $db ->prepare('
					SELECT joueur.id,joueur.nom,joueur.prenom,joueur.age,joueur.equipe,
						joueur.numero_maillot,equipe.logo AS equipe_logo,equipe.nom AS equipe_nom
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
	$results[$i]['prenom'] = ucfirst($results[$i]['prenom']); //premiere lettre en majiscule
	$results[$i]['nom']	= strtoupper($results[$i]['nom']);//tout en majiscule

	if($results[$i]['equipe'] == 0)
			{
				$results[$i]['equipe_logo'] = "img/logo/pole-emploi.jpg";
			}
}

 
echo json_encode($results);

?>