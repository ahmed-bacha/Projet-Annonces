<!-- Header -->
<?php
$title = "Home Page";
require_once("header.php");
 ?>

<!-- Page Content -->
<div  class="well">

  <form id="uploadimage" action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
      <label for="exampleInputEmail1">
        Photos concernant votre annonce
      </label>
      <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="thumbnail">
              <img id="img1" data-src="holder.js/300x300" alt="...">
            <div class="caption">
              <p>
                  <input type="file" class="filestyle" data-badge="false" name="image[]" id="file1">
              </p>
            </div>
          </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="thumbnail">
              <img id="img2" data-src="holder.js/300x300" alt="...">
            <div class="caption">
              <p>
                  <input type="file" class="filestyle" data-badge="false" name="image[]" id="file2">
              </p>
            </div>
          </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="thumbnail">
              <img id="img3" data-src="holder.js/300x300" alt="...">
            <div class="caption">
              <p>
                  <input type="file" class="filestyle" data-badge="false" name="image[]" id="file3">
              </p>
            </div>
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



<script charset="utf-8">

  $("form#uploadimage").submit(function(event){

    //disable the default form submission
    event.preventDefault();

    var formData = new FormData($(this)[0]);

    $.ajax({
      url: 'traitement-image.php',
      type: 'POST',
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      success: function (returndata) {

      }
    });

    return false;
  });


    $("#file1").change(function() {


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

</script>

<!-- Footer -->
<?php
require_once("footer.php");
?>
