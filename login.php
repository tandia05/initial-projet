<?php
include "includes/utile.inc.php";
include 'includes/connexion_db.php';
include "includes/header.php";
include "includes/menu.php";

if(isset($_POST['mail']) && isset($_POST['pass']))
		{
			$email = $_POST['mail'];
			$pass = $_POST['pass'];

			$db = connect();
			$query = $db->prepare('SELECT * FROM users WHERE 
				email = :email AND  password = :password');
			$query->execute(array(
									':email' 		=>  	$email,
									':password'		=>  	$pass));
			$result = $query->fetch();
			
			if($result) // si $result different de  false, on lougue le user
			{
				$_SESSION['user'] = $result;
				
				header('redirect:index.php');
			}
			else
			{
				echop('Utilisateu/trice inconnu(e)');
			}

		}
	else
		{
			echop('provlemes');
		}


?>

 <?php include "includes/footer.php";?>