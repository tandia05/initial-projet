
<?php
include "includes/equipe.inc.php";
include "includes/utile.inc.php";
include "includes/header.php";
include "includes/menu.php";

?>

<h1>Players</h1>

<!-- <button id="btn">Test</button>  
<button id="reset">Reset</button>
<button id="ajax">Ajax</button>
<ul id="list"></ul> -->

<a href="#" id="displayFormPlayer">Afficher le formulaire</a>

<div class="well" id="formPlayer">
	<label>Nom:</label>
	<input type="text" name="">

	<label>Prenom:</label>
	<input type="text" name="">

	<label>Age:</label>
	<input type="text" name="">

	<label>Numero:</label>
	<select>
		<?php
			for ($i=1; $i < 1000; $i++) 
			{ 
				echo '<option value="'.$i.'">'.'numeo'.$i. '</option>';
			}
		?>
	</select>

	<label>Equipe :</label>		
		<?php echo selectFormat(getTeams());?>

		<button class="btn btn-primary btn-xs">Enreistrer</button>
		<span id="message"></span>
	
</div>




<div  id="filters">
<strong>Limite d'age</strong>



	<select id="selectAge">
		<option value="20">20 ans</option>
		<option value="25">25 ans</option>
		<option value="30">30 ans</option>
		<option value="35">35 ans</option>
	</select>
</div>
<p>Nombre de paragrapgue:<strong id="nbResults"></strong></p>
<div  id="listPlayers"></div>
<!-- Charger la liste des joueus par ajax-->

<!--<script type="text/javascript" src="js/script.js"></script> -->
<script type="text/javascript" src="js/zepto.min.js"></script>
<script type="text/javascript" src="js/lodash.js"></script>
<script type="text/javascript" src="js/players.js"></script>


<?php  include "includes/footer.php" ?>