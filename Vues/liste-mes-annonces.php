<?php
require_once("../Utils/includeAll.php");

// On démarre la session
session_start();


if(isset($_SESSION['utilisateurM'])){
  $userM = $_SESSION['utilisateurM'];
}

?>


<!-- Header -->
<?php

$title = "Exemple d'une annonce";
require_once("header.php");

?>

<!-- Page Content -->
<div class="col-lg-12">

  <div class="well">
    <p>
      <i><?php echo $userM->nom; ?></i>
      <strong><?php echo $userM->email ?></strong>
    </p>
  </div>

  <table class="table table-striped">

    <thead>
      <tr>
        <th>#</th>
        <th>Titre de l'annonce</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Editer</th>
        <th>Supprimer</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>1</td>
        <td>iMac 5K</td>
        <td>Samy</td>
        <td>2300,00€</td>
        <td><span class="glyphicon glyphicon-pencil"></span></td>
        <td><span class="glyphicon glyphicon-remove"></span></td>
      </tr>

      <tr>
        <td>2</td>
        <td>CGI Chargeur</td>
        <td>Balanti</td>
        <td>20,00€</td>
        <td><span class="glyphicon glyphicon-pencil"></span></td>
        <td><span class="glyphicon glyphicon-remove"></span></td>
      </tr>


    </tbody>
  </table>



</div>

<!-- Footer -->
<?php
require_once("footer.php");
?>
