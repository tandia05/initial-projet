<?php
include_once 'access.inc.php'; 
$base = 'http://localhost/PROJECTS/PHP/';

 $tittle = "formation php Aston";
 $menus = [
 			[ 'href' =>  "index.php" , "label" => "Index" ],
 			[ 'href' =>  "variable.php" , "label" => "variables" ],
 			[ 'href' =>  "boucles.php" , "label" => "boucles" ],
 			[ 'href' =>  "function.php" , "label" => "functions" ],
 			[ 'href' =>  "get.php?country=italie&sport=football" , "label" => "GET" ],
 			[ 'href' =>  "joueurs.php" , "label" => "joueurs" ],
 			[ 'href' =>  "equipes.php" , "label" => "Equipes" ],
 			[ 'href' =>  "addPlayer.php" , "label" => "addJoueur" ],
 			[ 'href' =>  "addTeam.php" , "label" => "addTeam" ],
 			[ 'href' =>  "players.php" , "label" => "Joueurs(ajax)" ],
 			[ 'href' =>  "angularjs/index.php" , "label" => "Joueurs(Angular)" ]


 		];


?>


<nav>
<ul class="list-inline">
	<?php
	/* foreach ($menus as $menu ) 
		 {
		 	echo "<li>" .$menu["label"]."</li>";
		 }*/
	?>
	<?php foreach($menus as $menu):?>
		<li>
			<a href="<?php echo $base.$menu["href"]; ?>">
				<?php echo $menu["label"]; ?>
			</a>
		</li>
	<?php endforeach?>	
	<?php 
		/*if (isset($_SESSION['user']))*/
		if(isLogged())
		{
			echo '<li><a href="logout.php">Deconnexion</a></li>';
		}
	?>
</ul>
</nav>
