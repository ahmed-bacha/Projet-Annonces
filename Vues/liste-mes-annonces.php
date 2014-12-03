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

      <?php

      $o_annonceC = new AnnonceC();

      $response = $o_annonceC->getAnnonceByUserId($userM->id);

      $_index = 1;

      while ($_donnees = $response->fetch()) {
        $o_annonceM = new AnnonceM($_donnees);
      ?>

        <tr>
          <td><?php echo $_index; ?></td>
          <td><?php echo $o_annonceM->titre; ?></td>
          <td><?php echo $o_annonceM->nom; ?></td>
          <td><?php echo $o_annonceM->prix; ?></td>
          <td><span class="glyphicon glyphicon-pencil"></span></td>
          <td>
            <a href="delete-anonce-treatement.php?idAnnonce=<?php echo $o_annonceM->id ?>">
              <span class="glyphicon glyphicon-remove"></span>
            </a>
          </td>
        <tr>

      <?php

        $_index += 1;

      }

      ?>

    </tbody>
  </table>



</div>

<!-- Footer -->
<?php
require_once("footer.php");
?>
