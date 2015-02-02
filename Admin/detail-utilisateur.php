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

// On extrait idUtilisateur
extract($_GET);

?>

<?php

$title = "Admin Detail d'un utilisateur";
require_once("header.php");

?>

<?php 

$o_utilisateurC = new UtilisateurC();

$o_utilisateurM = $o_utilisateurC->getUserById($idUtilisateur);


?>

<!-- *** Page Content Here *** -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Detail d'utilisateur
    </h1>

    <ul class="list-group">

      <li class="list-group-item">Id :    <?php  echo $o_utilisateurM->id; ?></li>
      <li class="list-group-item">Nom :   <?php  echo $o_utilisateurM->nom ?></li>
      <li class="list-group-item">Email : <?php  echo $o_utilisateurM->email; ?></li>
        
    </ul>

    <a href="liste-utilisateurs.php" class="btn btn-success">
      <i class="fa fa-arrow-left">
        <small> Retour à la liste</small>
      </i>
    </a>


  </div>
</div>
<!-- /.row -->



<!-- Footer -->
<?php
require_once("footer.php");
?>
