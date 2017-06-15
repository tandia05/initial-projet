<?php
include_once "connexion_db.php";
function getTeams()
{
	$db = connect();
	$query = $db->prepare('SELECT * FROM equipe ORDER BY equipe.nom  ASC');
	$query->execute();
	return $query->fetchAll();
}

/*function selectFormat($teams)
{
	$output = '<select name="equipe">';
	
	foreach($teams as $team)
	{
		$output .= '<option value="' .$team['id'].'">'.$team['nom']. '</option>';
	}

	$output .= '</select>';
	return $output;

}*/

function selectFormatWithOpt($teams,$opt)
{
	$output = '<select name="equipe">';
	
	foreach($teams as $team)
	{
		if ($team['id'] == $opt)
		{
			$output .= '<option selected value="' .$team['id'].'">'.$team['nom']. '</option>';
		}
		else
		{
			$output .= '<option value="' .$team['id'].'">'.$team['nom']. '</option>';
		}
		
	}

	$output .= '</select>';
	return $output;

}

function selectFormat($teams)
{
	//ng-model permet a ahular de  de surveiller 
	//la valeur selectionné dans le menu de selection
	$output = '<select ng-model="player.equipe" name="equipe">';
	$output .= '<option value="0"> Sans equipe</option>';
	foreach ($teams as $team ) 
	{
		$output .= '<option value="' . $team['id']. '">' .$team['nom'].'</option>';
	}
	$output .= '</select>';
	return $output;
}



function tableFormat($teams)
{
	$output = '<table table="table-striped equipe">';
	$output .= '<option value="0"> Sans equipe</option>';
	$output .= '<tr><th>Nom </th><th>Entraineur </th><th>Couleur</th><th>logo</th></tr>';
	foreach($teams as $team)
	{
		$output .= '<tr>';

		$output .= '<td>' .$team['nom']. '</td>';
		$output .= '<td>' .$team['entraineur']. '</td>';
		$output .= '<td>' .$team['couleur']. '</td>';
		$output .= '<td><img src="' . $team['logo'] . '"width="40"></td>';

		$output .= '</tr>';
	}

	

	$output .= '</table>';
	return $output;

}

function getTeamById($id)
{
	$db = connect();
	$query = $db->prepare('SELECT * FROM equipe WHERE id = :id');
	$query->execute(array('id' => $id));
	return $query->fetch();
}


function createTeam($team)
{
	$db = connect();
	$query = $db->prepare('INSERT INTO equipe (nom, entraineur, couleur,logo) VALUES (:nom, 
		:entraineur, :couleur, :logo)');

	$result = $query->execute(array(
		':nom'				=> $team['nom'],
		':entraineur'		=> $team['entraineur'],
		':couleur'			=> $team['couleur'],
		':logo'				=> $team['logo']
		));
	return $result;// booleen/ vrai si succes
}


?>