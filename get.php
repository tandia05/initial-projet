<?php
include "includes/utile.inc.php";
include "includes/header.php";
include "includes/menu.php";


?>
<h1>GET</h1>

<?php
// Super globale $GET  est un tableau associatif
// contenant les parametres fournis dans l'URL

$country = $_GET["country"];
$sport = $_GET["sport"];

echop('pays demandé: '.$country);
echop('Sport demandé: '.$sport);

switch (strtolower($country)) {
	case 'italie':
		echo "Ciamo molto felici di imparare il PHP";
		include 'italie.php';
		break;

	case 'France':
		echo "Nous sommes tres heureux d'apprendre le PHP";
		break;

	case 'Roumanie':
		echo "Suntem foarte feriiti sa invatan PHP";
		break;

	case 'Espagne':
		echo "Esta muy felices de apprender el PHP";
		break;
	
	default:
		echo "Pays inconu";
		break;
}
?>

<?php include "includes/footer.php"; ?>