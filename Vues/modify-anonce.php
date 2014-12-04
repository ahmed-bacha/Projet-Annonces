<?php
require_once("../Utils/includeAll.php");

  // On démarre la session
  session_start();

  if(isset($_SESSION['utilisateurM'])){

    $userM = $_SESSION['utilisateurM'];

  }

  // Récupération des données liée à l'anonce

  extract($_GET);

  $o_annonceC = new AnnonceC();

  $o_annonceM  = $o_annonceC->getAnnonceById($idAnnonce);

  $_arrayImages = $o_annonceC->deConcatImagesNames($o_annonceM);

?>


<!-- Header -->
<?php

$title = "Exemple d'une annonce";
require_once("header.php");

?>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-4">
    <div id ="erreur" class="alert alert-danger" role="alert">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-4">
    <div id ="success" class="alert alert-success" role="alert">
    </div>
  </div>
</div>

<!-- Page Content -->
<div class="row">
  <div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-8">
    <form id="form" action="" method="post" enctype="multipart/form-data">


      <!-- Champs pour les informations sur l'utilisateur -->
      <blockquote>
        <h4>Vos informations</h4>
      </blockquote>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="form-group">
            <label for="exampleInputPassword1">
              Nom
            </label>
            <div class="input-group">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
              <input id="nom" type="text" name="nom" class="form-control" value="<?php echo $o_annonceM->nom ?>" placeholder="Nom">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="form-group">
            <label for="exampleInputPassword1">
              Prénom
            </label>
            <div class="input-group">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
              <input id="prenom" type="text" name="prenom" class="form-control" value="<?php echo $o_annonceM->prenom ?>" placeholder="Prénom">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="form-group">
            <label for="exampleInputPassword1">
              Téléphone
            </label>
            <div class="input-group">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-earphone"></span>
              </span>
              <input id="telephone" type="tel" name="telephone" class="form-control" value="<?php echo $o_annonceM->telephone ?>" placeholder="Téléphone">
            </div>
          </div>
        </div>
      </div>

      <!-- Champs concernant l'annonce -->
      <blockquote>
        <h4>
          Votre annonce
        </h4>
      </blockquote>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Titre de l'annonce</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon  glyphicon-pencil"></span></span>
              <input id="titre" type="text" name="titre" class="form-control" value="<?php echo $o_annonceM->titre ?>" placeholder="Titre de l'annonce">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="form-group">
            <label for="exampleInputPassword1">Prix de l'annonce</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
              <input id="prix" type="number" step="0.01" name="prix" class="form-control" value="<?php echo $o_annonceM->prix ?>" placeholder="Prix de l'annonce">
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">
          Description de l'annonce
        </label>
        <textarea id="description" class="form-control" name="description" placeholder="Saisir une description de l'annonce" rows="3"><?php echo $o_annonceM->description ?></textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">
          Photos concernant votre annonce
        </label>
        <div class="row">
          <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <div class="thumbnail">

              <!-- element croix  -->
              <div class="delete-icon">
                <span id="delete-icon-1" class="glyphicon glyphicon-remove-sign"></span>
              </div>

              <img id="img1" data-src="holder.js/200x200" alt="img1" src="images/<?php echo $_arrayImages[0] ?>" />
              <div class="caption">
                <p>
                  <input type="file" class="form-control" title="submit" data-badge="false" name="image[]" id="file1">
                </p>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <div class="thumbnail">


              <!-- element croix  -->
              <div class="delete-icon">
                <span id="delete-icon-2" class="glyphicon glyphicon-remove-sign"></span>
              </div>
              <img id="img2" data-src="holder.js/200x200" alt="img2" src="images/<?php echo $_arrayImages[1] ?>" />
              <div class="caption">
                <p>
                  <input type="file" class="form-control" data-badge="false" name="image[]" id="file2">
                </p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="thumbnail">


              <!-- element croix  -->
              <div class="delete-icon">
                <span id="delete-icon-3" class="glyphicon glyphicon-remove-sign"></span>
              </div>
              <img id="img3" data-src="holder.js/200x200" alt="img3" src="images/<?php echo $_arrayImages[2] ?>" />
              <div class="caption">
                <p>
                  <input type="file" class="form-control" data-badge="false" name="image[]" id="file3">
                </p>

              </div>
            </div>
          </div>
        </div>

        <blockquote>
          <h4>
            Soumettre votre annonce
          </h4>
        </blockquote>

        <div class="row">
          <div class="col-xs-12 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4">
            <p>
              <button type="submit" id="submit" class="btn btn-primary btn-lg btn-block">Modifer</button>
            </p>
          </div>
        </div>


      </form>
    </div>
  </div>

  <!-- Script de d'ajout d'une image -->
  <script src="js/add-annonce.js"></script>

  <!-- Footer -->
  <?php
  require_once("footer.php");
  ?>
