<?php
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();


if(isset($_SESSION['utilisateurM'])){
  $userM = $_SESSION['utilisateurM'];
}else{
  header("location: log-in.php");
}

?>


<!-- Header -->
<?php

$title = "Exemple d'une annonce";
require_once("header.php");

?>

<script src="js/add-annonce.js"></script>

<div class="row">
   <div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-4">
	   <div id ="erreur" class="alert alert-danger" role="alert">
		 </div>
   </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-4">
    <div id ="success" class="alert alert-success" role="alert">
    </div>
  </div>
</div>

<!-- Page Content -->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-8">
    <form id="form" action="" method="post" enctype="multipart/form-data">


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
				    	<div id="nom" class="input-group">
					  		<span class="input-group-addon">
					  			<span class="glyphicon glyphicon-user"></span>
					  		</span>
					  		<input id="nom" type="text" name="nom" class="form-control" placeholder="Nom">
                <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
						   </div>
				   	</div>
          <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer votre nom</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				   	<div class="form-group">
				    	<label for="exampleInputPassword1">
				    		Prénom
				    	</label>
				    	<div id="prenom" class="input-group">
					  		<span class="input-group-addon">
					  			<span class="glyphicon glyphicon-user"></span>
					  		</span>
					  		<input id="prenom" type="text" name="prenom" class="form-control" placeholder="Prénom">
                <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
						</div>
				   	</div>
          <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer votre prenom</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				   	<div class="form-group">
				    	<label for="exampleInputPassword1">
				    		Téléphone
				    	</label>
				    	<div id="telephone" class="input-group">
					  		<span class="input-group-addon">
					  			<span class="glyphicon glyphicon-earphone"></span>
					  		</span>
					  		<input id="telephone" type="tel" name="telephone" class="form-control" placeholder="Téléphone">
                <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
						</div>
				   	</div>
             <div class="alert alert-danger text-center" role="alert" hidden="true">format incorrect</div>
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
				    	<div id="titre" class="input-group">
					  		<span class="input-group-addon"><span class="glyphicon  glyphicon-pencil"></span></span>
					  	<input id="titre" type="text" name="titre" class="form-control" placeholder="Titre de l'annonce">
              <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
						</div>
				  	</div>
            <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer le titre de votre annonce</div>
				</div>
			</div>

		  	<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				  	<div class="form-group">
				    	<label for="exampleInputPassword1">Prix de l'annonce</label>
				    	<div id="prix" class="input-group">
					  		<span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
					  		<input id="prix" type="number" step="0.01" name="prix" class="form-control" placeholder="Prix de l'annonce">
                <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
						</div>
				  	</div>
            <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer un prix en chiffre</div>
				</div>
			</div>

		  	<div id="description" class="form-group">
		  		<label for="exampleInputEmail1">
		  			Description de l'annonce
		  		</label>
		  		<textarea id="description" class="form-control" name="description" placeholder="Saisir une description de l'annonce" rows="3"></textarea>
		 	 </div>
        <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer une description</div>

        <div class="form-group">
          <label for="exampleInputEmail1">
            Photos concernant votre annonce
          </label>
          <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
              <div class="thumbnail">

                <!-- element croix  -->
                <div class="delete-icon">
                  <span id="delete-icon-1" class="glyphicon glyphicon-remove-sign"></span>
                </div>

                <img id="img1" data-src="holder.js/200x200" alt="...">
                <div class="caption">
                  <p>
                    <input type="file" class="form-control" title="submit" data-badge="false" name="image[]" id="file1">
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
              <div class="thumbnail">


                <!-- element croix  -->
                <div class="delete-icon">
                  <span id="delete-icon-2" class="glyphicon glyphicon-remove-sign"></span>
                </div>
                <img id="img2" data-src="holder.js/200x200" alt="...">
                <div class="caption">
                  <p>
                    <input type="file" class="form-control" data-badge="false" name="image[]" id="file2">
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <div class="thumbnail">


                <!-- element croix  -->
                <div class="delete-icon">
                  <span id="delete-icon-3" class="glyphicon glyphicon-remove-sign"></span>
                </div>
                <img id="img3" data-src="holder.js/200x200" alt="...">
                <div class="caption">
                  <p>
                    <input type="file" class="form-control" data-badge="false" name="image[]" id="file3">
                  </p>

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
                <button name="submit" type="submit" id="submit" class="btn btn-primary btn-lg btn-block">Soumettre</button>
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
