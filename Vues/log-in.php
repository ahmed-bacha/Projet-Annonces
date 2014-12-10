<!-- Header -->
<?php

$title = "Home Page";
require_once("header.php");

 ?>

 <script src="js/log-in.js"></script>

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


	<form id="form" action="log-in-traitement.php" method="POST" enctype="multipart/form-data">

	  <div class="form-group" >
	    <label for="mail">Adresse email</label>
	    <div class="input-group">
	      <div class="input-group-addon">@</div>
	      <input id="email" name="email" class="form-control" type="email" placeholder="sam@hotmail.com">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="password">Mot de passe</label>
	   	<div class="input-group">
	      <div class="input-group-addon">
	      	<span class="glyphicon glyphicon-lock"></span>
	      </div>
	      <input id="password" name="password" type="password" class="form-control" id="password" placeholder="*********">
	    </div>

	  </div>

	  <div class="form-group col-lg-6 col-lg-offset-3">
	  	 <button id="submit" type="submit" class="btn btn-primary btn-block">Valider</button>
	  </div>

	</form>

</div>


<!-- Footer -->
<?php
require_once("footer.php");
?>
