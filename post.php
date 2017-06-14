<?php
//session_start(); //ouverture ou reprise d'une session
include "includes/utile.inc.php";
include "includes/header.php";
include "includes/menu.php";
/*var_dump($_SESSION);*/

//$_SESSION['test'] = 'ça marche !';
/*var_dump($_SESSION);*/

?>
<h1>POST</h1>

<?php
/*print_r($_POST);*/

$mail = $_POST['mail'];
$pass = $_POST['pass'];
if (isset($_POST['admin']))
	$admin = $_POST['admin'];


	/*$test = null;
	if (isset($test))
		{
			echop("la vaiable test est definie");
		}
		else
		{
			echop("la vaiable test n'est pas definie");
		}*/
			if ($mail == "test@test.fr" && $pass == 1234 && isset($admin))
				{
					echop("identification reussie");

					// Enreister cet etat dans la session
				$_SESSION['logged'] = true;
				header('location:index.php');
				}


				else
				{
					echop("identification echouée");
				}

?>


<?php  include "includes/footer.php" ?>