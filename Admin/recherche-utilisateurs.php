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

$title = "Admin recherche d'un utilisateur";
require_once("header.php");

?>

<!-- *** Page Content Here *** -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Recherche d'un utilisateur
      <small>Description Description Description</small>
    </h1>


  </ol>

</div>
</div>
<!-- /.row -->



<!-- Footer -->
<?php
require_once("footer.php");
?>
