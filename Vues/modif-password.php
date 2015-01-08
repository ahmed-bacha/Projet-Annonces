<?php
require_once("../Utils/includeAll.php");


// On démarre la session
session_start();

if(isset($_SESSION['utilisateurM'])){
  $userM = $_SESSION['utilisateurM'];
}else{
  header('Location:log-in.php');
}

// HEADER

$title = "Exemple d'une annonce";
require_once("header.php");

?>

 <script src="js/modif-password.js"></script>

 <!-- Page Content -->
 <div class="well col-lg-5 col-lg-offset-3">
     <?php

   if(isset($_GET['err']) && !empty($_GET['err'])){
     $erreur = json_decode($_GET['err']);
     ?>
     <div id ="err" class="alert alert-danger" hidden="true" role="alert">
       <?php
       foreach ($erreur as $value){
         echo "<p>$value</p>";
       }
       ?>
     </div>

     <?php
   }else{
     ?>
     <div id ="erreur" class="alert alert-danger" hidden="true" role="alert">
     </div>
     <?php
   }
   ?>
   <form id="form" action="modif-password-traitement.php" method="POST">

      <div id="divCurrent_pass" class="form-group">
        <label for="exampleInputPassword1">
          Mot de passe actuel
        </label>
        <div class="input-group">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
          <input type="password" name="current_pass" class="form-control" placeholder="Mot de passe">
          <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
        </div>
      </div>

      <div class="alert alert-danger text-center" role="alert" hidden="true">MDP non valide ( min 5 caractères )</div>


      <div id="divNew_pass" class="form-group">
        <label for="exampleInputPassword1">
          Nouveau mot de passe
        </label>
        <div class="input-group">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
          <input type="password" name="new_pass" class="form-control" placeholder="Mot de passe">
          <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
        </div>
      </div>
      
      <div class="alert alert-danger text-center" role="alert" hidden="true">MDP non valide ( min 5 caractères )</div>

      <div id="divConfirm_new_pass" class="form-group">
        <label for="exampleInputPassword1">
          Confirmez le nouveau mot de passe
        </label>

        <div class="input-group">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
          <input type="password" name="confirm_new_pass" class="form-control" placeholder="Mot de passe">
          <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
        </div>
      </div>

      <div class="alert alert-danger text-center" role="alert" hidden="true">MDP non valide ( min 5 caractères )</div>

      <div class="row">
        <div class="col-xs-offset-4 col-xs-4 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4">
          <p>
            <input type="submit" value="Valider" id="submit" class="btn btn-primary btn-lg btn-block">
          </p>
        </div>
      </div>


    </form>
</div>
<!-- Footer -->
<?php
require_once("footer.php");
?>
