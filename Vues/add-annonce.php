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
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-8">
		<form role="form" method="POST" action= "add-annonce-traitement.php">
		   
		  	<!-- Champs pour les informations sur l'utilisateur -->
		   	<blockquote>
  				<h4>Vos informations</h4>
		   	</blockquote>

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">	
				   	<div class="form-group">
				    	<label for="exampleInputPassword1">
				    		Nom
				    	</label>
				    	<div class="input-group">
					  		<span class="input-group-addon">
					  			<span class="glyphicon glyphicon-user"></span>
					  		</span>
					  		<input type="text" name="nom" class="form-control" placeholder="Nom">
						</div>
				   	</div>
				</div>
			</div>
	
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">	
				   	<div class="form-group">
				    	<label for="exampleInputPassword1">
				    		Prénom
				    	</label>
				    	<div class="input-group">
					  		<span class="input-group-addon">
					  			<span class="glyphicon glyphicon-user"></span>
					  		</span>
					  		<input type="text" name="prenom" class="form-control" placeholder="Prénom">
						</div>
				   	</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">	
				   	<div class="form-group">
				    	<label for="exampleInputPassword1">
				    		Téléphone
				    	</label>
				    	<div class="input-group">
					  		<span class="input-group-addon">
					  			<span class="glyphicon glyphicon-earphone"></span>
					  		</span>
					  		<input type="tel" name="telephone" class="form-control" placeholder="Téléphone">
						</div>
				   	</div>
				</div>
			</div>
	
			<!-- Champs concernant l'annonce -->
		   	<blockquote>
  			   	<h4>
  			   		Votre annonce
  			   	</h4>
		   	</blockquote>
			
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">	
				  	<div class="form-group">
				    	<label for="exampleInputEmail1">Titre de l'annonce</label>
				    	<div class="input-group">
					  		<span class="input-group-addon"><span class="glyphicon  glyphicon-pencil"></span></span>
					  	<input type="text" name="titre" class="form-control" placeholder="Titre de l'annonce">
						</div>
				  	</div>
				</div>
			</div>

		  	<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">	
				  	<div class="form-group">
				    	<label for="exampleInputPassword1">Prix de l'annonce</label>
				    	<div class="input-group">
					  		<span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
					  		<input type="text" name="prix" class="form-control" placeholder="Prix de l'annonce">
						</div>
				  	</div>
				</div>
			</div>
		  
		  	<div class="form-group">
		  		<label for="exampleInputEmail1">
		  			Description de l'annonce
		  		</label>
		  		<textarea class="form-control" name="description" placeholder="Saisir une description de l'annonce" rows="3"></textarea>
		 	 </div>
		  	
		  	<div class="form-group">
		  		<label for="exampleInputEmail1">
		  			Photos concernant votre annonce
		  		</label>
		  		<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					    <div class="thumbnail">
					      	<img data-src="holder.js/300x300" alt="...">  	
					    	<div class="caption">
					    		<p>
					        		<button type="button" class="btn btn-primary btn-lg btn-block">Ajouter une image</button>
					    		</p>
					    	</div>
					    </div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					    <div class="thumbnail">
					      	<img data-src="holder.js/300x300" alt="...">  	
					    	<div class="caption">
					    		<p>
					        		<button type="button" class="btn btn-primary btn-lg btn-block">Ajouter une image</button>
					    		</p>
					    	</div>
					    </div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					    <div class="thumbnail">
					      	<img data-src="holder.js/300x300" alt="...">  	
					    	<div class="caption">
					    		<p>
					        		<button type="button" class="btn btn-primary btn-lg btn-block">Ajouter une image</button>
					    		</p>
					    	</div>
					    </div>
					</div>
				</div>
		 	</div>
			
			<blockquote>
  			   	<h4>
  			   		Soumettre votre annonce
  			   	</h4>
		   	</blockquote>

			<div class="row">
				<div class="col-xs-12 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4">	
					<p>
					    <button type="submit" class="btn btn-primary btn-lg btn-block">Soumettre</button>
					</p>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Footer -->
<?php 
require_once("footer.php"); 
?>