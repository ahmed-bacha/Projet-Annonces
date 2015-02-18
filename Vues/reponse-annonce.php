<!-- Header -->
<?php 
$title = "Home Page";
require_once("header.php");
 ?>
	<?php 

	 if(isset($_GET['err']) && !empty($_GET['err'])){
		$erreur = json_decode($_GET['err']);
	?>  
       <div class="row">
       <div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-4">
	   <div class="alert alert-danger" role="alert">
	   	<?php 
	   		foreach ($erreur as $value){
	    		echo "<p>$value</p>";
			}
	   	 ?>
		</div>	
        </div>
        </div>			
	<?php 				
		 }
	 ?>
	 
<!-- Page Content -->
<form role="form" method="POST" action="mail-traitement.php">

<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-8">
		    <blockquote>
  				<h4> Répondre à l'annonce</h4>
		   	</blockquote>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">		   	
		  <div class="form-group">
		    <label for="exampleInputNom">Nom</label>
		    <div class="input-group">
			  <span class="input-group-addon"><span class="glyphicon  glyphicon-pencil"></span></span>
			  <input name ="nom" type="text" class="form-control" placeholder="Votre nom">
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
			  <input name="email" type="email" class="form-control" placeholder="Votre email">
			</div>
		  </div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">			  
		  <div class="form-group">
		  	<label for="exampleInputText">Texte</label>
		  	<textarea name="text" class="form-control" placeholder="Votre texte" rows="2"></textarea>
		  </div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">			  
          <div class="form-group">
          	<div class="checkbox">
              <label> <input type="checkbox"name="check" value="true"> Recevoir une copie de cet email </label>
             </div>
			<button type="submit" class="btn btn-default active">Envoyer</button>
          </div>
	</div>
</div>
</form>
<!-- Footer -->
<?php 
require_once("footer.php"); 
?>