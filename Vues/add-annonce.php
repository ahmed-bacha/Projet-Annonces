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
					  		<input id="nom" type="text" name="nom" class="form-control" placeholder="Nom">
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
					  		<input id="prenom" type="text" name="prenom" class="form-control" placeholder="Prénom">
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
					  		<input id="telephone" type="tel" name="telephone" class="form-control" placeholder="Téléphone">
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
					  	<input id="titre" type="text" name="titre" class="form-control" placeholder="Titre de l'annonce">
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
					  		<input id="prix" type="number" step="0.01" name="prix" class="form-control" placeholder="Prix de l'annonce">
						</div>
				  	</div>
				</div>
			</div>

		  	<div class="form-group">
		  		<label for="exampleInputEmail1">
		  			Description de l'annonce
		  		</label>
		  		<textarea id="description" class="form-control" name="description" placeholder="Saisir une description de l'annonce" rows="3"></textarea>
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

                <img id="img1" data-src="holder.js/200x200" alt="...">
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
                <img id="img2" data-src="holder.js/200x200" alt="...">
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
                <img id="img3" data-src="holder.js/200x200" alt="...">
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
                <button type="submit" id="submit" class="btn btn-primary btn-lg btn-block">Soumettre</button>
              </p>
            </div>
          </div>


		</form>
	</div>
</div>

<script charset="utf-8">

$( "#erreur" ).hide();
$( "#success" ).hide();

$("form#form").submit(function(event){

  //disable the default form submission
  event.preventDefault();

  var formData    = new FormData($(this)[0]);
  // console.log(formData.toString());

    $.ajax({
      url: 'traitement-image.php',
      type: 'POST',
      data: formData,
      mimeType:"multipart/form-data",
      contentType: false,
      async: false,
      cache: false,
      processData: false,

      success: function(result)
      {
        if (jQuery.isEmptyObject(result) == false) {
          $( "#erreur" ).show();
          $('#erreur').html(result);
        }else{
          $( "#erreur" ).hide();
          $( "#success" ).show();
          $( "#success" ).html("Annonce créée !!!");
        }

        console.log(result);
      }

    });


  return false;
});


$("#file1").change(function() {


  var file = this.files[0];
  // console.log(file);
  var imagefile = file.type;
  //alert(imagefile);
  var match= ["image/jpeg","image/png","image/jpg"];
  if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
    {
      return false;
    }
    else
      {
        var reader = new FileReader();
        reader.onload = imageIsLoaded1;

        reader.readAsDataURL(this.files[0]);

      }
    });

    function imageIsLoaded1(e) {

      $('#img1').attr('src', e.target.result);

    };

    $("#file2").change(function() {


      var file = this.files[0];
      console.log(file);
      var imagefile = file.type;
      //alert(imagefile);
      var match= ["image/jpeg","image/png","image/jpg"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
      {
        return false;
      }
      else
      {
        var reader = new FileReader();
        reader.onload = imageIsLoaded2;

        reader.readAsDataURL(this.files[0]);

      }
    });

    function imageIsLoaded2(e) {

      $('#img2').attr('src', e.target.result);

    };

    $("#file3").change(function() {


      var file = this.files[0];
      console.log(file);
      var imagefile = file.type;
      //alert(imagefile);
      var match= ["image/jpeg","image/png","image/jpg"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
      {
        return false;
      }
      else
      {
        var reader = new FileReader();
        reader.onload = imageIsLoaded3;

        reader.readAsDataURL(this.files[0]);

      }
    });

    function imageIsLoaded3(e) {

      $('#img3').attr('src', e.target.result);
    };



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

  </script>

<!-- Footer -->
<?php
require_once("footer.php");
?>
