<!-- Header -->
<?php 
$title = "Home Page";
require_once("header.php");
 ?>

<!-- Page Content -->
<div class="row">
	<div class="col-md-12" style='border: 1px solid black'>
		<form role="form">
		  <div class="form-group">
		    <label for="exampleInputNom">Nom</label>
		    <div class="input-group">
			  <span class="input-group-addon"><span class="glyphicon  glyphicon-pencil"></span></span>
			  <input type="text" class="form-control" placeholder="Votre nom">
			</div>
		  </div>
		  
		  <div class="form-group">
		    <label for="exampleInputTeleph">Téléphone</label>
		    <div class="input-group">
			  <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
			  <input type="text" class="form-control" placeholder="Votre numéro de téléphone">
			</div>
		  </div>
		 <div class="form-group">
		    <label for="exampleInputEmail">Email</label>
		    <div class="input-group">
			  <span class="input-group-addon"><span class="glyphicon  glyphicon-envelope"></span></span>
			  <input type="text" class="form-control" placeholder="Votre email">
			</div>
		  </div>
		  <div class="form-group">
		  	<label for="exampleInputText">Texte</label>
		  	<textarea class="form-control" placeholder="Votre texte" rows="2"></textarea>
		  </div>
          <div class="form-group">
          	<div class="checkbox">
              <label> <input type="checkbox"> Recevoir une copie de cet email </label>
             </div>
			<button type="button" class="btn btn-default active">Envoyer</button>
          </div>
		</form>
	</div>
</div>

<!-- Footer -->
<?php 
require_once("footer.php"); 
?>