<?php

include "includes/utile.inc.php";
include "includes/equipe.inc.php";
include "includes/header.php";
include "includes/menu.php";


?>
<h1>Equipes</h1>
<?php

echo tableFormat(getTeams());
/*foreach ($teams as $team)
	echo '<tr>';
	echo '<p>' .$team['nom'].' '.$team['entraineur'].' '.$team['couleur'].'</p>';

*/
?>


<?php  include "includes/footer.php" ?>