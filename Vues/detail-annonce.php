<?php
  require_once("../Utils/includeAll.php");
  // On démarre la session
  session_start();
  extract($_GET);


  if(isset($_SESSION['utilisateurM'])){
    $userM = $_SESSION['utilisateurM'];
  }
  if(empty($idAnnonce)){
    header("location: log-in.php");
  }

  $title = "Home Page";

  require_once("header.php");

  //---------------------------------------
  // script to see php errors
  //---------------------------------------

  error_reporting(E_ALL);

  ini_set('display_errors','On');



  $o_annonceC     = new AnnonceC();

  $o_annonceM     = $o_annonceC->getAnnonceById($idAnnonce);

  $o_utilisateurC = new utilisateurC();

  $o_utilisateurM = $o_utilisateurC->getUserById($o_annonceM->idUtilisateur);

  $names_img      = $o_annonceC->deconcatImages($o_annonceM);

?>

    <div class="row ">
    	<div class="col-lg-10 col-lg-offset-1">
        <div class="row ">
          <div class="col-lg-8 ">
    		    <div class="panel panel-default">
        			<!-- titre annonce -->
        			<div class="panel-heading text-center">
                <h3 class="panel-title text-center">
                  <?php echo $o_annonceM->titre  ?>
                </h3>
        			</div>
        			<div class="panel-body text-center">

                <?php

                if (is_array($names_img)) {

                  $_urlImage1 = (isset($names_img[0])) ? "images/".$names_img[0] : "resources-img/noImage.jpg" ;

                  $_urlImage2 = (isset($names_img[1])) ? "images/".$names_img[1] : "resources-img/noImage.jpg" ;

                  $_urlImage3 = (isset($names_img[2])) ? "images/".$names_img[2] : "resources-img/noImage.jpg" ;

                  ?>

                  <!-- l'image principale -->
                  <div class="panel panel-default panel-image">
                    <div class="panel-body">
                      <div class="row ">
                        <div class="col-lg-12">

                          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                              <div class="item active">
                                <div class="cont-image-caroussel">
                                  <img class="img-thumbnail img-responsive small-image" src="<?php echo $_urlImage1 ?>" alt="First slide">
                                </div>
                              </div>
                              <div class="item">
                                <div class="cont-image-caroussel">
                                  <img class="img-thumbnail img-responsive small-image big-image-panel" src="<?php echo $_urlImage2 ?>" alt="Second slide">
                                </div>
                              </div>
                              <div class="item">
                                <div class="cont-image-caroussel">
                                  <img class="img-thumbnail img-responsive small-image big-image-panel" src="<?php echo $_urlImage3 ?>" alt="Third slide">
                                </div>
                              </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- fin l'image principale -->
                  <div class="panel panel-default panel-image">
                    <div class="panel-body">
                      <!-- premiere image -->
                      <div class="row">
                        <div class="col-lg-4 fixed-height">
                          <img class="img-thumbnail img-responsive small-image change-image-panel" src=" <?php echo $_urlImage1 ?> " data-src="holder.js/100x100" alt="">
                        </div>
                        <!-- deuxieme image -->
                        <div class="col-lg-4 fixed-height">
                          <img class="img-thumbnail img-responsive small-image change-image-panel" src=" <?php echo $_urlImage2 ?> " data-src="holder.js/100x100" alt="">
                        </div>
                        <!-- troisieme image -->
                        <div class="col-lg-4 fixed-height">
                          <img class="img-thumbnail img-responsive small-image change-image-panel" src=" <?php echo $_urlImage3 ?> " data-src="holder.js/100x100" alt="">
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php

                }

                if (is_string($names_img)) {

                  ?>

                  <div class="panel panel-default panel-image">
                    <div class="panel-body">
                      <div class="row ">
                        <div class="col-lg-8 col-lg-offset-2 ">
                          <?php

                          $_urlImage = "images/".$names_img;

                          ?>
                          <img class="img-thumbnail img-responsive small-image" src=" <?php echo $_urlImage; ?> " data-src="holder.js/100x100" alt="">
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php

                }

                if (is_null($names_img)) {

                  ?>

                  <div class="panel panel-default panel-image">
                    <div class="panel-body">
                      <div class="row ">
                        <div class="col-lg-8 col-lg-offset-2 ">
                          <?php

                          $_urlImage = "resources-img/noImage.jpg";

                          ?>
                          <img class="img-thumbnail img-responsive small-image" src=" <?php echo $_urlImage; ?> " data-src="holder.js/100x100" alt="">
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php

                }

                ?>

              <div class="text-justify">
                <blockquote>
                  description :
                </blockquote>
                  <?php echo $o_annonceM->description ?>
              </div>
            <hr>
            <!-- prix -->
            <div class="text-center">
              <button type="button" class="btn btn-default btn-lg">
                Prix :
                <span class="glyphicon glyphicon-euro" aria-hidden="true"></span>
                <?php echo $o_annonceM->prix?>
              </button>
            </div>
            <hr>
            <div class="col-lg-12 ">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <button type="button" id="responseButton" class="btn btn-primary btn-lg">
                    Répondre
                  </button>
                </div>
                <div class="panel-body">
                  <h6 id="intruction" >Appuyer sur "Répondre" pour dérouler le formulaire de réponse</h6>
                  <hr>
                  <form role="form" method="POST" action="mail-traitement.php">
                    <blockquote>
                        <h4> Répondre à l'annonce</h4>
                      </blockquote>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-10 col-lg-offset-1">
                          <div class="form-group">
                            <label for="exampleInputNom">Nom</label>
                            <div class="input-group">
                              <span class="input-group-addon"><span class="glyphicon  glyphicon-pencil"></span></span>
                              <input name ="nom" type="text" class="form-control" placeholder="Votre nom">
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-10 col-lg-offset-1">
                            <div class="form-group">
                              <label for="exampleInputEmail">Email</label>
                              <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon  glyphicon-envelope"></span></span>
                                <input name="email" type="email" class="form-control" placeholder="Votre email">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-10 col-lg-offset-1">
                            <div class="form-group">
                              <label for="exampleInputText">Texte</label>
                              <textarea name="text" class="form-control" placeholder="Votre texte" rows="2"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-10 col-lg-offset-1">
                            <div class="form-group">
                              <div class="checkbox">
                                <label> <input type="checkbox"name="check" value="true"> Recevoir une copie de cet email </label>
                              </div>
                              <button type="submit" class="btn btn-default active">Envoyer</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        		 </div>
        			</div>
                <div class="row ">
                  <div class="col-lg-4 ">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title text-center">
                          Informations
                        </h3>
                      </div>
                      <ul class="list-group">
                        <li class="list-group-item">
                          nom :
                          <span class="label label-default">
                            <?php echo $o_annonceM->nom; ?>
                          </span>
                        </li>
                        <li class="list-group-item">
                          prenom :
                          <span class="label label-default">
                            <?php echo $o_annonceM->prenom; ?>
                          </span>
                        </li>
                        <li class="list-group-item">
                          telephone :
                          <span class="label label-default">
                            <?php echo $o_annonceM->telephone; ?>
                          </span>
                        </li>
                        <li class="list-group-item">
                          mail :
                          <span class="label label-default">
                            <a href="#">
                              <?php

                                $o_utilisateurC = new UtilisateurC();

                                $o_utiliseurM = $o_utilisateurC -> getUserById($o_annonceM->idUtilisateur);

                                echo $o_utiliseurM->email

                              ?>
                              </a>
                            </span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Block informations annonceur -->

        </div>
      </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>

$(function() {

    //---------------------------------------
    // formulaire response treatment
    //---------------------------------------

    $('form').hide();

    $('#responseButton').click(function() {

    $('#intruction').fadeToggle("slow");

    $('form').slideToggle("slow");

  });

});

</script>

<!-- Footer -->
<?php
require_once("footer.php");
?>
