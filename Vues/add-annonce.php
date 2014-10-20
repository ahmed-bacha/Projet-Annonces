<!-- Header -->
<?php 
$title = "Home Page";
require_once("header.php");
 ?>

<!-- Page Content -->
<div class="row">
	<div class="col-md-12 col-xs-12 col-xs-12" style='border: 1px solid black'>
		<form role="form">
		  
		  <div class="form-group">
		    <label for="exampleInputEmail1">Titre de l'annonce</label>
		    <div class="input-group">
			  <span class="input-group-addon"><span class="glyphicon  glyphicon-pencil"></span></span>
			  <input type="text" class="form-control" placeholder="Titre de l'annonce">
			</div>
		  </div>
		  
		  <div class="form-group">
		    <label for="exampleInputPassword1">Prix de l'annonce</label>
		    <div class="input-group">
			  <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
			  <input type="text" class="form-control" placeholder="Prix de l'annonce">
			</div>
		  </div>
		  <div class="form-group">
		  	<textarea class="form-control" placeholder="Saisir une description de l'annonce" rows="3"></textarea>
		  </div>
		</form>
	</div>
</div>

<!-- Footer -->
<?php 
require_once("footer.php"); 
?>