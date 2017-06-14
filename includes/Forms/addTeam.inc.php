<?php

?>
<h1>Ajouter une equipe</h1>

<div class='container'>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-4">
				<label>Nom :</label>
				<input type="text" name="nom">
			</div>
			<div class="col-md-4">
				<label>Entraineur: </label>
				<input type="text" name="entraineur">
			</div>
			<div class="col-md-4">
				<label>Couleur :</label>
				<input type="text" name="couleur">
			</div>

			<div class="col-md-12">
				<label>Logo :</label>
				<input type="file" name="logo">
			</div>

			<div class="col-md-12">
				<input type="submit" name="input" value="valider">
			</div>
		</div>
	</form>
</div>

