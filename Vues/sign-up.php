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
			<div class="input-group">
			  <div class="input-group-addon">@</div>
			  <input name="nom" class="form-control" type="text" placeholder="SAM">
			</div>
		</div>

		<div class="form-group">
			<label for="mail">Adresse email</label>
			<div class="input-group">
		 		<div class="input-group-addon">@</div>
		  		<input name="email" class="form-control" type="email" placeholder="sam@hotmail.com">
			</div>
		</div>

		<div class="form-group">
			<label for="password">Mot de passe</label>
			<div class="input-group">
		  		<div class="input-group-addon">
		  			<span class="glyphicon glyphicon-lock"></span>
		  		</div>
		  		<input name="password" type="password" class="form-control" id="password" placeholder="*********">
			</div>
		</div>

		<div class="form-group">
			<label for="password">Confirmez le mot de passe</label>
			<div class="input-group">
		  		<div class="input-group-addon">
		  			<span class="glyphicon glyphicon-lock"></span>
		 		 </div>
		  		<input type="password" class="form-control" id="password" placeholder="*********">
			</div>
		</div>

	  <div class="form-group col-lg-6 col-lg-offset-3">
	  	 <button type="submit" class="btn btn-primary btn-block">Valider</button>
	  </div>
	 
	</form>

</div>

<!-- Footer -->
<?php 
require_once("footer.php"); 
?>