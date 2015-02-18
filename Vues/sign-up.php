<!-- Header -->
<?php
$title = "Home Page";
require_once("header.php");
 ?>

 <script src="js/sign-up.js"></script>

 <!-- Page Content -->
 <div class="well col-lg-5 col-lg-offset-3">

   <?php

   if(isset($_GET['err']) && !empty($_GET['err'])){
     $erreur = json_decode($_GET['err']);
     ?>
     <div id ="err" class="alert alert-danger" role="alert">
       <?php
       foreach ($erreur as $value){
         echo "<p>$value</p>";
       }
       ?>
     </div>

     <?php
   }else{
     ?>
     <div id ="erreur" class="alert alert-danger" role="alert">
     </div>
     <?php
   }
   ?>

    <form id="form" action="sign-up-traitement.php" method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="nom">Nom</label>
			<div id ="divNom" class="input-group">
			  <div class="input-group-addon">@</div>
			  <input id="nom" name="nom" class="form-control" type="text" placeholder="SAM">
        <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
			</div>
		</div>

    <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer votre nom</div>

		<div class="form-group">
			<label for="mail">Adresse email</label>
			<div id="divEmail" class="input-group">
		 		<div class="input-group-addon">@</div>
		  		<input id="email" name="email" class="form-control" type="email" placeholder="sam@hotmail.com">
          <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
			</div>
		</div>

    <div class="alert alert-danger text-center" role="alert" hidden="true">Email non valide</div>

		<div class="form-group">
			<label for="password">Mot de passe</label>
			<div id="divMdp1"class="input-group">
		  		<div class="input-group-addon">
		  			<span class="glyphicon glyphicon-lock"></span>
		  		</div>
		  		<input name="password" type="password" class="form-control" id="password" placeholder="*********">
          <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
			</div>
		</div>

    <div class="alert alert-danger text-center" role="alert" hidden="true">MDP non valide ( min 5 charactères )</div>

		<div class="form-group">
			<label for="password">Confirmez le mot de passe</label>
			<div id="divMdp2"class="input-group">
		  		<div class="input-group-addon">
		  			<span class="glyphicon glyphicon-lock"></span>
		 		 </div>
		  		<input name="password_confirme" type="password" class="form-control" id="password" placeholder="*********">
          <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
			</div>
		</div>

    <div class="alert alert-danger text-center" role="alert" hidden="true">Les MDP doivent être les mêmes</div>


	  <div class="form-group col-lg-6 col-lg-offset-3">
	  	 <button name="submit" type="submit" class="btn btn-primary btn-block">Valider</button>
	  </div>

	</form>

</div>

<!-- Footer -->
<?php
require_once("footer.php");
?>
