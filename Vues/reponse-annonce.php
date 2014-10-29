<!-- Header -->
<?php 
$title = "Home Page";
require_once("header.php");
 ?>

<!-- Page Content -->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-8">
		    <blockquote>
  				<h4> Répondre à l'annonce</h4>
		   	</blockquote>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">		   	
		<form role="form">
		  <div class="form-group">
		    <label for="exampleInputNom">Nom</label>
		    <div class="input-group">
			  <span class="input-group-addon"><span class="glyphicon  glyphicon-pencil"></span></span>
			  <input type="text" class="form-control" placeholder="Votre nom">
			</div>
		  </div>
		</div>
	</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">				  
		  <div class="form-group">
		    <label for="exampleInputTeleph">Téléphone</label>
		    <div class="input-group">
			  <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
			  <input type="text" class="form-control" placeholder="Votre numéro de téléphone">
			</div>
		  </div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">			  
		 <div class="form-group">
		    <label for="exampleInputEmail">Email</label>
		    <div class="input-group">
			  <span class="input-group-addon"><span class="glyphicon  glyphicon-envelope"></span></span>
			  <input type="text" class="form-control" placeholder="Votre email">
			</div>
		  </div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">			  
		  <div class="form-group">
		  	<label for="exampleInputText">Texte</label>
		  	<textarea class="form-control" placeholder="Votre texte" rows="2"></textarea>
		  </div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">			  
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