<?php
 	$connected = true;
?>

<?php include "includes/header.php";?>
<?php include "includes/menu.php";?>

<h1><?php echo $tittle ?></h1>

   <!--- Formulaire de connection -->

   <?php if ($connected):?>
   <form action="login.php" method="POST">
    <label>Email: </label>
   	<input type="email" placeholder="Taper votre email" name="mail">

   	<label>Mot de passe: </label>
   	<input type="password" placeholder="Taper votre mot de passe" name="pass">

    <label>Administrateur</label>
    <input type="checkbox" name="admin">

   	<input type="submit" name="" value="valier">
   </form>
  <?php endif ?>



  <?php include "includes/footer.php";?>
