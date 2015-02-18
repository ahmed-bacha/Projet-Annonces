<?php
// On inclue toutes les classes du projet
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();


if(isset($_SESSION['Admin'])){
  $adminM = $_SESSION['Admin'];
}else{
  header("location: index.php");
}

?>

<?php

$title = "Mon Compte";
require_once("header.php");

?>

<script src="js/admin-compte.js"></script>


<!-- *** Page Content Here *** -->
<div class="row">
  <div class="col-lg-12 text-center">
    <h1 class="page-header">
      Mon Compte :
      <fieldset disabled>
        <button class="btn btn-lg btn-success"><?php echo $adminM->login ?></button>
      </fieldset>
      <small>(Modification du mot de passe)</small>
    </h1>
  </div>
</div>
<!-- /.row -->



<div class="form-group col-lg-6 col-lg-offset-3" >
  <div id ="erreur" class="alert alert-danger" role="alert" >
  </div>
</div>
<div class="form-group col-lg-6 col-lg-offset-3" >
  <div id ="success" class="alert alert-success" role="alert" >
    Mot de passe changé
  </div>
</div>


<form id="form" action="admin-login-traitement.php" method="POST">

  <!--  User Field -->
  <div class="form-group col-lg-8 col-lg-offset-3" >

    <label for="ancienMdp">Ancien mot de passe :</label>
    <div id="divLogin" class="input-group col-lg-8">
      <div class="input-group-addon">
        <span class="glyphicon glyphicon-lock"></span>
      </div>

      <input type="password" id="ancienMdp" name="ancienMdp" class="form-control"  placeholder="Ancien mot de passe">
      <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>

    </div>
  </div>

  <div class="form-group col-lg-8 col-lg-offset-3" >
    <div class="alert alert-danger text-center" role="alert" hidden="true">Mdp vide</div>
  </div>

  <!-- Password Field -->
  <div class="form-group col-lg-8 col-lg-offset-3">
    <label for="password1">Nouveau mot de passe :</label>

    <div id="divPassword" class="input-group col-lg-8">
      <div class="input-group-addon">
        <span class="glyphicon glyphicon-lock"></span>
      </div>
      <input id="password1" name="password1" type="password" class="form-control" placeholder="*********">
      <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
    </div>
  </div>

  <div class="form-group col-lg-8 col-lg-offset-3" >
    <div class="alert alert-danger text-center" role="alert" hidden="true">Password vide</div>
  </div>

  <!-- Password Field -->
  <div class="form-group col-lg-8 col-lg-offset-3">
    <label for="password2">Nouveau mot de passe :</label>

    <div id="divPassword" class="input-group col-lg-8">
      <div class="input-group-addon">
        <span class="glyphicon glyphicon-lock"></span>
      </div>
      <input id="password2" name="password2" type="password" class="form-control" placeholder="*********">
      <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
    </div>
  </div>

  <div class="form-group col-lg-8 col-lg-offset-3" >
    <div class="alert alert-danger text-center" role="alert" hidden="true" >Les MDP doivent être les mêmes</div>
  </div>

  <div class="form-group col-lg-4 col-lg-offset-4">
    <button name="submit" id="submit" type="submit" class="btn btn-primary btn-block">Changement</button>
  </div>

</form>


<!-- Footer -->
<?php
require_once("footer.php");
?>
