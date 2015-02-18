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

$title = "Admin liste";
require_once("header.php");

?>

<script src="js/admin-liste.js"></script>

<!-- *** Page Content Here *** -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header text-center">
      Admin liste
    </h1>
  </div>
</div>
<!-- /.row -->


<div class="row">
  <div class="col-lg-5 col-lg-offset-4">

    <table class="table table-striped">

      <thead>
        <tr>
          <th>#</th>
          <th>Nom</th>
          <th>Supprimer</th>
        </tr>
      </thead>

      <tbody>

        <?php

        $adminC = new AdminC();

        $response = $adminC->getAllAdmin();

        $_index = 1;
        //var_dump($response);
        foreach ($response as $value) {
          ?>

          <tr>
            <td><?php echo $_index; ?></td>
            <td><?php echo $value->login; ?></td>
            <td>
              <a class="deleteAdmin" href="delete-admin.php?idAdmin=<?php echo $value->id ?>">
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
          Admin supprimé
        </div>
        <br />
        <div class="alert alert-danger text-center" hidden="true" role="alert">
          Une erreur inattendue s'est produite :(
        </div>

  </div>
</div>


<!-- Footer -->
<?php
require_once("footer.php");
?>
