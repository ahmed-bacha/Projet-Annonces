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

$title = "Admin DashBoard Page";
require_once("header.php");

?>

<!-- *** Page Content Here *** -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Traitement des annonces
      <small>Valider / Supprimer les dernières annonces</small>
    </h1>

    <!-- all conteneurs panel start -->

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- all tasks will be treated start -->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Liste des annonces à traiter </h3>
            </div>
            <div class="panel-body">

            <?php

            $tab_annonces = AnnonceM::getAllAnnonces(NON_TRAITE);

            foreach ($tab_annonces as $o_annonceM) {

              $_imageString = $o_annonceM->images.'<br />';

              $o_annonceC = new AnnonceC();

              $_imageArray = $o_annonceC->deconcatImages($o_annonceM);

              ?>

              <!-- non treated div start -->

              <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-md-offset-1">
                <div class="panel panel-yellow">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <i class="fa fa-gears fa-3x"><small> à traiter</small></i>
                      </div>
                      <div class="ol-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
                        <button value="<?php echo $o_annonceM->id ?>" type="button" class="btn btn-danger">
                          <i class="fa fa-close fa-1x">
                            <small> Supprimer</small>
                          </i>
                        </button>
                        <button value="<?php echo $o_annonceM->id ?>" type="button" class="btn btn-success">
                          <i class="fa fa-check fa-1x">
                            <small> Valider</small>
                          </i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="panel-body annonce-content">

                    <!-- photo anonce list start -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="panel panel-yellow">
                        <div class="panel-heading">
                          <i class="fa fa-file-photo-o fa-1x"><small> Images annonce</small></i>
                        </div>
                        <div class="panel-body">
                          <?php

                            if(is_array($_imageArray)){

                              $_imageArraySize = count($_imageArray);

                              if($_imageArraySize == 3) {

                                foreach ($_imageArray as $_image) {

                                  ?>

                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 text-center">
                                    <img data-src="holder.js/140x140" class="img-thumbnail fixed-height" src="../Vues/images/<?php echo $_image ?>" alt="A generic square placeholder image with rounded corners">
                                  </div>

                                  <?php

                                }

                              }

                              if($_imageArraySize == 2){

                                foreach ($_imageArray as $_image) {

                                ?>

                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 text-center">
                                    <img data-src="holder.js/140x140" class="img-thumbnail fixed-height" src="../Vues/images/<?php echo $_image ?>" alt="A generic square placeholder image with rounded corners">
                                  </div>

                                <?php

                                }

                                ?>

                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 text-center">
                                    <img data-src="holder.js/140x140" class="img-thumbnail fixed-height" src="../Vues/resources-img/noImage.jpg" alt="A generic square placeholder image with rounded corners">
                                  </div>

                                <?php

                              }

                            }

                            if(is_String($_imageArray)){

                            ?>

                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 text-center">
                                <img data-src="holder.js/140x140" class="img-thumbnail fixed-height" src="../Vues/images/<?php echo $_imageArray ?>" alt="A generic square placeholder image with rounded corners">
                              </div>

                            <?php

                              for ($i = 0 ; $i < 2 ; $i++) {

                                ?>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 text-center">
                                  <img data-src="holder.js/140x140" class="img-thumbnail fixed-height" src="../Vues/resources-img/noImage.jpg" alt="A generic square placeholder image with rounded corners">
                                </div>

                                <?php

                              }

                            }

                            if(is_null($_imageArray)){

                              for ($i = 0 ; $i < 3 ; $i++) {

                                ?>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 text-center">
                                  <img data-src="holder.js/140x140" class="img-thumbnail fixed-height" src="../Vues/resources-img/noImage.jpg" alt="A generic square placeholder image with rounded corners">
                                </div>

                                <?php

                              }

                            }

                          ?>
                        </div>
                      </div>
                    </div>
                    <!-- photo anonce list end -->

                    <!-- detail annonce start -->

                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                      <div class="panel panel-yellow">
                        <div class="panel-heading">
                          <i class="fa fa-tags fa-1x"><small> Détail annonce</small></i>
                        </div>
                        <div class="list-group">
                          <a href="#" class="list-group-item text-left">
                            <i class="fa fa-fw fa-angle-right"></i>Titre :
                            <span style="color:rgba(0, 0, 0, 1.0)" > <?php echo $o_annonceM->titre ?></span>
                          </a>
                          <a href="#" class="list-group-item text-justify">
                            <i class="fa fa-fw fa-pencil"></i> Description :
                            <span style="color:rgba(0, 0, 0, 1.0)" >
                              <?php echo $o_annonceM->description ?>
                            </span>
                          </a>
                          <a href="#" class="list-group-item">
                            <i class="fa fa-fw fa-money"></i> Prix :
                            <span style="color:rgba(0, 0, 0, 1.0)" >
                              <?php echo $o_annonceM->prix ?> €
                            </span>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- detail annonce end -->

                    <!-- detail user start -->

                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                      <div class="panel panel-yellow">
                        <div class="panel-heading">
                          <i class="fa fa-user fa-1x"><small> Détail utilisateur</small></i>
                        </div>
                        <div class="list-group">
                          <a href="#" class="list-group-item">
                            <i class="fa fa-fw fa-angle-right"></i> nom :
                            <span style="color:rgba(0, 0, 0, 1.0)" >
                              <?php

                                $o_utilisateurM = UtilisateurM::getUserById($o_annonceM->idUtilisateur);

                                echo $o_utilisateurM->nom;

                              ?>
                            </span>
                          </a>
                          <a href="#" class="list-group-item">
                            <i class="fa fa-fw fa-paper-plane"></i> mail :
                            <span style="color:rgba(0, 0, 0, 1.0)" >
                              <?php echo $o_utilisateurM->email ?>
                            </span>
                          </a>
                        </div>
                      </div>
                    </div>

                    <!-- detail user end -->

                    <!-- photo anonce list end -->

                  </div>

                  <a href="#" class="annonce-content-link">
                    <div class="panel-footer">
                      <p class="text-center slideDown">
                        Voir le détail de l'annonce <i class="fa fa-arrow-circle-down"></i>
                      </p>
                    </div>
                  </a>

                </div>
              </div>

              <!-- non treated div end -->

              <?php

            }

            ?>

            </div>
          </div>
        </div>

        <!-- all tasks will be treated end -->

      </div>
    </div>

    <!-- all conteneurs panel start -->

    </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-default fixed-navbar">
  <div class="container container-fluid" id="wrap" style="padding-top: 60px;">
    <div class="navbar-header">

    </div>
  </div>
</nav>

<!-- /.row -->

<script charset="utf-8">

  $(function(){

    //-----------------------
    // function to slide up or down the announce detail
    //-----------------------

    $('.annonce-content').hide();

    $('.annonce-content-link').click( function() {

      var textSlide = $(this).find('p');

      if($(this).find('p').hasClass('slideDown')){

        $(this).find('p').removeClass('slideDown');

        $(this).find('p').addClass('slideUp');

        $(this).find('p').empty().append('Masquer le détail de l\'annonce '+'<i class="fa fa-arrow-circle-up"></i>');

        $(this).prev().slideDown();

      } else {

        $(this).find('p').removeClass('slideUp');

        $(this).find('p').addClass('slideDown');

        $(this).find('p').empty().append('Voir le détail de l\'annonce '+'<i class="fa fa-arrow-circle-down"></i>');

        $(this).prev().slideUp();

      }

      return false;

    });

    //-----------------------
    // function validate an announce
    //-----------------------

    $('.btn-success').click(function () {

      var idAnnonce   = $(this).attr('value');

      var validation  = 1;

      var currentElement = $(this);

      $.get( 'validation-annonce-treatment.php?_idAnnonce='+idAnnonce+'&_validation='+validation , function( data ) {

        data = parseInt(data);

        if(data){

          currentElement.closest('.panel.panel-yellow').find('.panel.panel-yellow').addClass('panel-green').removeClass('panel-yellow');

          currentElement.closest('.panel.panel-yellow').find('i:first').removeClass('fa-gears').addClass('fa-check').text(' validée');

          currentElement.closest('.panel.panel-yellow').addClass('panel-green').removeClass('panel-yellow');

          currentElement.prev().fadeOut();

          currentElement.fadeOut();

          currentElement.closest('.panel.panel-green').find('.panel-body.annonce-content').slideUp();

          currentElement.closest('.panel.panel-green').find('.annonce-content-link');

          var link = currentElement.closest('.panel.panel-green').find('.annonce-content-link');

          if(link.find('p').hasClass('slideUp')){

            link.find('p').removeClass('slideUp');

            link.find('p').addClass('slideDown');

            link.find('p').empty().append('Voir le détail de l\'annonce '+'<i class="fa fa-arrow-circle-down"></i>');

            link.prev().slideUp();

          }

        }

      });

    });

    //-----------------------
    // function delete an announce
    //-----------------------

    $('.btn-danger').click(function () {

      var idAnnonce   = $(this).attr('value');

      var validation  = 0;

      var currentElement = $(this);

      $.get( 'validation-annonce-treatment.php?_idAnnonce='+idAnnonce+'_validation='+validation , function( data ) {

        currentElement.closest('.panel.panel-yellow').find('.panel.panel-yellow').addClass('panel-red').removeClass('panel-yellow');

        currentElement.closest('.panel.panel-yellow').find('i:first').removeClass('fa-gears').addClass('fa-close').text(' supprimée');

        currentElement.closest('.panel.panel-yellow').addClass('panel-red').removeClass('panel-yellow');

        currentElement.next().fadeOut();

        currentElement.fadeOut();

        currentElement.closest('.panel.panel-red').find('.panel-body.annonce-content').slideUp();

        currentElement.closest('.panel.panel-red').find('.annonce-content-link');

        var link = currentElement.closest('.panel.panel-red').find('.annonce-content-link');

        if(link.find('p').hasClass('slideUp')){

          link.find('p').removeClass('slideUp');

          link.find('p').addClass('slideDown');

          link.find('p').empty().append('Voir le détail de l\'annonce '+'<i class="fa fa-arrow-circle-down"></i>');

          link.prev().slideUp();

        }

      });

    });

  });

</script>

<!-- Footer -->
<?php
require_once("footer.php");
?>
