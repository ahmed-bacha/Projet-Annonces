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

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <h4>Mes annonces</h4>
      </div>
      <div class="panel-body">
        <p>
          Liste de toutes vos annonces non traitées, traitées et qui seront supprimées (non acceptées).
        </p>
      </div>

      <!-- Table -->
    <table class="table table-striped">

      <thead>
        <tr>
          <th>#</th>
          <th>Titre de l'annonce</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Statut</th>
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
            <td>
                <?php echo AnnonceC::statutVal($o_annonceM->statut); ?>
            </td>
            <td>
              <a href="modify-anonce.php?idAnnonce=<?php echo $o_annonceM->id ?>">
                <span class="glyphicon glyphicon-pencil"></span>
              </a>
            </td>
            <td>
              <a class="deleteAnnonce" href="delete-anonce-treatement.php?idAnnonce=<?php echo $o_annonceM->id ?>">
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
    <br />
    <div class="alert alert-success text-center" hidden="true" role="alert">
      Votre annonce a bien ete supprimée :)
    </div>
    <br />
    <div class="alert alert-danger text-center" hidden="true" role="alert">
      Une erreur inattendue s'est produite :(
    </div>


  </div>

<!-- JQuery library inclusion -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- jQuery upload -->
  <script>
  $(function(){

    $('.deleteAnnonce').click(function(){

      var currentItem = $(this);

      var _tab = currentItem.attr('href').split(/=/);

      var _annonceIndex = _tab[1];

      $.ajax({

        url : 'delete-anonce-treatement-ajax.php',

        type : 'GET',

        dataType : 'json',

        data : 'idAnnonce='+_annonceIndex,

        success : function(reponse, statut){

          if(reponse){

            currentItem.closest('tr').remove();

            $('.alert-success').slideDown('normal');

            setInterval(function(){

                          $('.alert-success').slideUp('normal');

                        },

                        1500);

          } else {

            $('.alert-danger').slideDown('normal');

            setInterval(function(){

                          $('.alert-danger').slideUp('normal');

                        },

                          1500);

          }

        }

      });

      return false;

    });

  });
  </script>

<!-- Footer -->
<?php
  require_once("footer.php");
?>
