<?php

include "includes/equipe.inc.php";
include "includes/utile.inc.php";
include "includes/header.php";
include "includes/menu.php";
/*var_dump($_SESSION);*/

if (isset($_POST['input']) && isset($_FILES))
{
	
	 // Deplacer le fichier vers le serveur
		$extension = substr($_FILES['logo']['name'],-4);
		$conditions = 
			$_FILES['logo']['size'] < 500000 &&
			isFormatAllowed($extension);
			//var_dump($conditions);


		 //upload du fichier
		if ($conditions)
			{ 
			  // Deplacer le fichier vers le serveur
				
				$src = $_FILES['logo']['tmp_name'];
				//$dest = 'img/logo/' . $_FILES['logo']['name'];
				$dest = 'img/logo/' . rightFormat($_POST['nom']) . $extension;
				move_uploaded_file($src, $dest);

				$team = $_POST;
				$team['logo'] = $dest; //on ajoute la clé logo dans le tableau associaif $team
			


					if (createTeam($team))
					{
						header('location:equipes.php');
					}
				else
					{
						echo '<p class="text-warning">l \' enregistremet a echoué </p>';
					}
			}
		else
			{
				echo "<p> format non auoeisé ou fichier  trop lourd </p>";
			}

}

?>


<?php

/*if (isset($_SESSION['logged']))*/
if (isset($_SESSION['user']))
	{
		if($_SESSION['user']['role'] == 'admin')
		{
			include 'includes/Forms/addTeam.inc.php';
			
		}
		else
		{
			echop('Droit insuffisant');
		}
	}
else
	{
		echop( "vous devez etre connecté pour acceder a cette page");
	}

	
?>



<?php  include "includes/footer.php" ?>