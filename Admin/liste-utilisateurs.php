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
$title = "Admin - Liste des utilisateurs";
require_once("header.php");
?>

<!-- *** Page Content Here *** -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Liste des utilisateurs
      <br>
      <small>details sur les utilisateurs du site</small>
    </h1>
  </div>
</div>
<!-- /.row -->

<!--  Page tables -->
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive text-center">
          <table class="table table-bordered table-hover table-striped">
            <thead >
              <tr class="text-center">
                <th class="col-lg-1 text-center">#Id</th>
                <th class="text-center">Nom</th>
                <th class="text-center">Email</th>
                <th class="col-lg-2 text-center">Supprimer</th>
                <th class="text-center">Detail</th>
              </tr>
            </thead>

            <tbody>

              <?php

              $liste_utilisateurs = UtilisateurM::getAllUsers();

              foreach ($liste_utilisateurs as $utilisateur) {

              ?>

              <tr>
                <td><?php  echo $utilisateur->id;  ?></td>
                <td><?php  echo $utilisateur->nom; ?></td>
                <td><?php  echo $utilisateur->email; ?></td>

                <td class="text-center">
                    <a href="supprimer-utilisateur.php?idUtilisateur=<?php echo $utilisateur->id;?>">
                      <i class="fa fa-trash" style="color:red;"></i>
                    </a>
                </td>

                <td class="text-center">
                  <a href="detail-utilisateur.php?idUtilisateur=<?php echo $utilisateur->id;?>">
                  <i class="fa fa-wrench"></i>
                  </a>
                </td>
              </tr>

              <?php
                }
              ?>

            </tbody>

          </table>

        </div>
      </div>
    </div>
  </div>
</div>
<!--  /.Page tables -->


<!-- Footer -->
<?php
require_once("footer.php");
?>
