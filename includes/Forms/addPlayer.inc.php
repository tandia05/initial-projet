


<h1>Enrejistrement  un joueur</h1>
<div class='container'>
	<form action="" method="POST">
		<div class="row">
			<div class="col-md-4">
				<label>Nom :</label>
				<input type="text" name="nom">
			</div>
			<div class="col-md-4">
				<label>Prenom: </label>
				<input type="text" name="prenom">
			</div>
			<div class="col-md-4">
				<label>Age :</label>
				<input type="text" name="age">
			</div>
		</div>
	
		<div class="row">
			<div class="col-md-6">
				<label>num_maillot :</label>
					<select name="numero_maillot">
						<?php
						for ($i=1; $i < 1000; $i++) 
						{ 
							echo '<option value="'.$i.'">'.'numeo'.$i. '</option>';
						}
						?>
					</select>
			</div>
			<div class="col-md-6">
					<label>Equipe :</label>
			
						<?php
							echo selectFormat(getTeams());
						?>
					
				<div class="col-md-12">
					<input type="submit" name="input" value="valider">
				</div>
			</div>
	</form>
</div>
