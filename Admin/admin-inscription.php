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
if(!AdminC::isAdministrateur($adminM->login, $adminM->mdp)){
  header("location: dashboard.php");
}

?>

<?php

$title = "Admin DashBoard Page";
require_once("header.php");

?>

<!-- *** Page Content Here *** -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header text-center">
      Inscription Admin
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
    inscription effectuée
  </div>
</div>


<form id="form" action="admin-login-traitement.php" method="POST">

  <!--  User Field -->
  <div class="form-group col-lg-8 col-lg-offset-3" >

    <label for="login">Utilisateur</label>
    <div id="divLogin" class="input-group col-lg-8">
      <div class="input-group-addon">
        <span class="glyphicon glyphicon-user"></span>
      </div>

      <input type="text" id="login" name="login" class="form-control"  placeholder="admin-name">
      <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>

    </div>
  </div>

  <div class="form-group col-lg-8 col-lg-offset-3" >
    <div class="alert alert-danger text-center" role="alert" hidden="true">Login vide</div>
  </div>

  <!-- Password Field -->
  <div class="form-group col-lg-8 col-lg-offset-3">
    <label for="password1">Mot de passe</label>

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
      <label for="password2">Mot de passe</label>

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
    <button name="submit" id="submit" type="submit" class="btn btn-primary btn-block">Inscription</button>
  </div>

</form>



<script charset="utf-8">

$(document).ready(function() {

  $( "#erreur" ).hide();
  $( "#success" ).hide();

  $("form#form").submit(function(event){

    //disable the default form submission

    event.preventDefault();

    var formData    = $("#form").serialize();
    console.log(formData);
    console.log($('#login').val());
    console.log($('#password1').val());
    console.log($('#password2').val());

    if (jQuery.isEmptyObject($('#login').val()) == false && jQuery.isEmptyObject($('#password1').val()) == false && jQuery.isEmptyObject($('#password2').val()) == false ) {
      $.ajax({
        url: 'admin-inscription-traitement.php',
        type: 'POST',
        data: $("#form").serialize(),
        mimeType:"multipart/form-data",
        async: false,
        cache: false,
        processData: false,

        success: function(result)
      {
        if (jQuery.isEmptyObject(result) == false) {

          $( "#erreur" ).show();
          $('#erreur').html(result);

        } else {
          $( "#success" ).show();
          $( "#erreur" ).hide();
          $( "#submit" ).prop("disabled", true);
        }


        console.log(result);
      }

    });

  }else{
    $( "#erreur" ).show();
    $('#erreur').html("Login ou mot de passe incorrects")
  }



  return false;
});

});



</script>



<!-- Footer -->
<?php
require_once("footer.php");
?>
