<!-- Header -->
<?php 
session_start();

require_once("header.php");
require_once("../Utils/includeAll.php");


$title = "Home Page";


$utilisateurC = new UtilisateurC();
$user = $utilisateurC->getUserById($_SESSION['id']);

 ?>

<!-- Page Content -->
<div class="well col-lg-5 col-lg-offset-3">

	<form role="form">

	  <div class="form-group">
	    <label for="nom">Nom</label>
	    <p><strong><?php echo $user->nom; ?></strong></p>
	  </div>

	  <div class="form-group">
	    <label for="email">Email</label>
	    <p><strong><?php echo $user->email ?></strong></p>
	  </div>

	  <div class="form-group col-lg-6 col-lg-offset-3">
	  	 <button type="submit" class="btn btn-primary btn-block">Modifier le mot de passe</button>
	  </div>
	 
	</form>

</div>

<!-- Footer -->
<?php 
require_once("footer.php"); 
?>