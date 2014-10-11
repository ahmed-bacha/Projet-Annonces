<!-- Header -->
<?php 
$title = "Home Page";
require_once("header.php");
 ?>

<!-- Page Content -->
<div class="well col-lg-5 col-lg-offset-3">

	<form role="form">

	  <div class="form-group">
	    <label for="nom">Nom</label>
	    <p><strong>SAM</strong></p>
	  </div>

	  <div class="form-group">
	    <label for="email">Email</label>
	    <p><strong>sam@gmail.com</strong></p>
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