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


<div class="well">
  <h5>Modification du password</h5>
</div>


<div class="row">
  <div class="col-xs-offset-2 col-xs-8 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    <form id="form" action="modif-password-traitement.php" method="POST">

      <div class="form-group">
        <label for="exampleInputPassword1">
          Mot de passe actuel
        </label>

        <div class="input-group">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
          <input type="password" name="current_pass" class="form-control" placeholder="Nom">
        </div>
      </div>


      <div class="form-group">
        <label for="exampleInputPassword1">
          Nouveau mot de passe
        </label>

        <div class="input-group">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
          <input type="password" name="new_pass" class="form-control" placeholder="Nom">
        </div>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">
          Confirmez le nouveau mot de passe
        </label>

        <div class="input-group">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
          <input type="password" name="confirm_new_pass" class="form-control" placeholder="Nom">
        </div>
      </div>

      <div class="row">
        <div class="col-xs-offset-4 col-xs-4 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4">
          <p>
            <input type="submit" value="Valider" id="submit" class="btn btn-primary btn-lg btn-block">
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
