<!-- Header -->
<?php

// On inclue toutes les classes du projet
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();


if(isset($_SESSION['Admin'])){
  $adminM = $_SESSION['Admin'];
}
?>

<?php

$title = "Admin DashBoard Page";
require_once("header.php");

?>

<!-- *** Page Content Here *** -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Dashboard
      <small>Home de la page Admin</small>
    </h1>
    <ol class="breadcrumb">

      <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
      </li>

      <?php

      // liste des annonces en BDD
      show(AnnonceM::getAllAnnonces());

      ?>

    </ol>
  </div>
</div>
<!-- /.row -->



<!-- Footer -->
<?php
require_once("footer.php");
?>