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
    <div class="alert alert-danger" role="alert">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-4">
    <div id="messageTreatment" class="alert alert-success text-center" role="alert">
    </div>
  </div>
</div>

<!-- Page Content -->
<div class="row">
  <div class="col-xs-12 col-sm-12 col-lg-offset-2 col-md-12 col-lg-offset-2 col-lg-8">
    <form id="form" action="modify-treatement.php" method="post" enctype="multipart/form-data">

      <!-- Envoyer en post l'id de l'annonce pour la récupérer -->
      <input type="text" hidden="true" name="annonceId" value="<?php echo $o_annonceM->id; ?>">

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
            <div class="input-group has-feedback">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
              <input id="nom" type="text" name="nom" class="form-control" value="<?php echo $o_annonceM->nom ?>" placeholder="Nom">
              <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
            </div>
          </div>
          <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer votre nom</div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="form-group">
            <label for="exampleInputPassword1">
              Prénom
            </label>
            <div class="input-group" >
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
              <input id="prenom" type="text" name="prenom" class="form-control" value="<?php echo $o_annonceM->prenom ?>" placeholder="Prénom">
              <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
            </div>
          </div>
          <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer votre prenom</div>
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
              <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
            </div>
          </div>
          <div class="alert alert-danger text-center" role="alert" hidden="true">format incorrect</div>
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
              <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
            </div>
          </div>
          <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer le titre de votre annonce</div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="form-group">
            <label for="exampleInputPassword1">Prix de l'annonce</label>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
              <input id="prix" type="text" name="prix" class="form-control" value="<?php echo $o_annonceM->prix ?>" placeholder="Prix de l'annonce">
              <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
            </div>
          </div>
          <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer un prix en chiffre</div>
        </div>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">
          Description de l'annonce
        </label>
        <textarea id="description" class="form-control" name="description" placeholder="Saisir une description de l'annonce" rows="3"><?php echo $o_annonceM->description ?></textarea>
      </div>
      <div class="alert alert-danger text-center" role="alert" hidden="true">Indiquer une description</div>

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
              <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Modifer</button>
            </p>
          </div>
        </div>


      </form>
    </div>
  </div>

  <!-- Script de d'ajout d'une image -->

  <!-- script src="js/modify-annonce.js"></script -->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <script>

    $(function(){

      $('.alert-danger').hide();

      $('.alert-success').hide();

      //--------------------------------
      // global variable declaration
      //--------------------------------

      var nom         = $('input[name="nom"]');

      var prenom      = $('input[name="prenom"]');

      var telephone   = $('input[name="telephone"]');

      var titre       = $('input[name="titre"]');

      var prix        = $('input[name="prix"]');

      var description = $('textarea[name="description"]');

      var submit      = $('button[name="submit"]');

      //--------------------------------
      // initial state
      //--------------------------------

      treatField(nom);

      treatField(prenom);

      treatPhoneField(telephone);

      treatField(titre);

      treatPriceField(prix);

      treatDescriptionField(description);

      //--------------------------------
      // treatment
      //--------------------------------

      nom.blur(function(){

        treatField($(this));

      });

      nom.focus(function(){

        setStandard($(this));

      });

      prenom.blur(function(){

        treatField($(this));

      });

      prenom.focus(function(){

        setStandard($(this));

      });

      telephone.blur(function(){

        treatPhoneField($(this));

      });

      telephone.focus(function(){

        setStandard($(this));

      });

      titre.blur(function(){

        treatField($(this));

      });

      titre.focus(function(){

        setStandard($(this));

      });

      prix.blur(function(){

        treatPriceField($(this));

      });

      prix.focus(function(){

        setStandard($(this));

      });

      description.blur(function(){

        treatDescriptionField($(this));

      });

      description.focus(function(){

        setStandardTextarea($(this));

      });


      //--------------------------------
      // function called during treatment
      //--------------------------------

      function setOk(element){

        element.closest('div').addClass('has-success');

        element.next().addClass('glyphicon-ok').show();

        able(submit);

      }

      function setKo(element){

        element.closest('div').addClass('has-error');

        element.next().addClass('glyphicon-remove').show();

        disable(submit);

      }

      function setOkTextarea(element){

        element.closest('div').addClass('has-success');

        able(submit);

      }

      function setKoTextarea(element){

        element.closest('div').addClass('has-error');

        disable(submit);

      }

      function setStandard(element){

        element.closest('div').removeClass().addClass('input-group has-feedback');

        element.next().removeClass().addClass('glyphicon form-control-feedback').hide();

      }

      function setStandardTextarea(element){

        element.closest('div').removeClass().addClass('form-group has-feedback');

      }


      function showError(element){

        element.closest('.form-group').next().slideDown();

      }

      function hideError(element){

        element.closest('.form-group').next().slideUp();

      }

      function notNull(element){

        var elementLength = element.val().length;

        var result = false;

        if(elementLength != 0){

          result = true;

        }

        return result;

      }

      function treatField(element){

        if(notNull(element)){

          setOk(element);

          hideError(element);

        } else {

          setKo(element);

          showError(element);

        }

      }

      function treatPhoneField(element){

        var phone   = element.val();

        var regexp  = /[0-9]{10}/;

        var result  = regexp.test(phone);

        if(result){

          setOk(element);

          hideError(element);

        } else {

          setKo(element);

          showError(element);

        }

      }

      function treatPriceField(element){

        var elementVal = element.val();

        var elementLength = elementVal.length;

        if(($.isNumeric(elementVal)) && elementLength != 0){

          setOk(element);

          hideError(element);

        } else {

          setKo(element);

          showError(element);

        }

      }

      function treatDescriptionField(element){

        if(notNull(element)){

          setOkTextarea(element);

          hideError(element);

        } else {

          setKoTextarea(element);

          showError(element);

        }

      }

      function disable(button){

        button.prop("disabled", true);

      }

      function able(button){

        button.prop("disabled", false);

      }

      //--------------------------------
      // function called to load image dynamically -- copy right Nacer
      //--------------------------------

      // fonction end --------------------------------------------

      $("#file1").change(function() {

        var file = this.files[0];
        // console.log(file);
        var imagefile = file.type;
        //alert(imagefile);
        var match= ["image/jpeg","image/png","image/jpg"];

        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))) {
            return false;
        } else {
            var reader = new FileReader();
            reader.onload = imageIsLoaded1;
            reader.readAsDataURL(this.files[0]);
        }

      });

      // fonction start ------------------------------------------

      function imageIsLoaded1(e) {

        $('#img1').attr('src', e.target.result);

        };

      // fonction end --------------------------------------------

      // fonction start ------------------------------------------

      $("#file2").change(function() {

        var file = this.files[0];
        console.log(file);
        var imagefile = file.type;
        //alert(imagefile);
        var match= ["image/jpeg","image/png","image/jpg"];

        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          return false;
        } else {
          var reader = new FileReader();
          reader.onload = imageIsLoaded2;
          reader.readAsDataURL(this.files[0]);
        }

      });

      // fonction end --------------------------------------------

      // fonction start ------------------------------------------

      function imageIsLoaded2(e) {

        $('#img2').attr('src', e.target.result);

      };

      // fonction end --------------------------------------------

      // fonction start ------------------------------------------

      $("#file3").change(function() {

        var file = this.files[0];
        console.log(file);
        var imagefile = file.type;
        //alert(imagefile);
        var match= ["image/jpeg","image/png","image/jpg"];

        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){

          return false;

        } else {

          var reader = new FileReader();

          reader.onload = imageIsLoaded3;

          reader.readAsDataURL(this.files[0]);

        }

      });

      // fonction end --------------------------------------------

      // fonction start ------------------------------------------

      function imageIsLoaded3(e) {

        $('#img3').attr('src', e.target.result);

      };

      // fonction end --------------------------------------------

      // fonction end --------------------------------------------

      $("#delete-icon-1").click(function() {

        $('#file1').val('');

        $('#img1').attr('src',"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDMwMCAzMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjExMy4wMTU2MjUiIHk9IjE1MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxOXB4O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjMwMHgzMDA8L3RleHQ+PC9nPjwvc3ZnPg==");

      });

      $("#delete-icon-2").click(function() {

        $('#file2').val('');

        $('#img2').attr('src',"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDMwMCAzMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjExMy4wMTU2MjUiIHk9IjE1MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxOXB4O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjMwMHgzMDA8L3RleHQ+PC9nPjwvc3ZnPg==");

      });

      $("#delete-icon-3").click(function() {

        $('#file3').val('');

        $('#img3').attr('src',"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDMwMCAzMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjExMy4wMTU2MjUiIHk9IjE1MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxOXB4O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjMwMHgzMDA8L3RleHQ+PC9nPjwvc3ZnPg==");

      });

      // fonction end --------------------------------------------

      //--------------------------------
      // Ajax request to post data on modify-treatement.php
      //--------------------------------

      $('form').submit(function(){

        var formData = new FormData($(this)[0]);

        $.ajax({

          url:          'modify-treatement.php',

          type:         'POST',

          data:         formData,

          mimeType:     'multipart/form-data',

          contentType:  false,

          async:        false,

          cache:        false,

          processData:  false,

          success: function(reponse, statut){

            $('form').slideUp('slow');

            $('#messageTreatment').append(reponse).slideDown();

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
