<?php
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();


if(isset($_SESSION['utilisateurM'])){
  $userM = $_SESSION['utilisateurM'];
}

?>


<!-- Header -->
<?php

$title = "Exemple d'une annonce";
require_once("header.php");

?>

<!-- Page Content -->
<div class="well col-lg-5 col-lg-offset-3">

	<form role="form">

	  <div class="form-group">
	    <label for="nom">Nom</label>
	    <p><strong><?php echo $userM->nom; ?></strong></p>
	  </div>

	  <div class="form-group">
	    <label for="email">Email</label>
	    <p><strong><?php echo $userM->email ?></strong></p>
	  </div>

	  <div class="form-group col-lg-6 col-lg-offset-3">
	  	 <a href="modif-password.php" class="btn btn-primary btn-block">Modifier le mot de passe</a>
	  </div>

	</form>

</div>

<!-- Footer -->
<?php
require_once("footer.php");
?>
