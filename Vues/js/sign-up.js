
$( document ).ready(function() {

  $( "#erreur" ).hide();

  $("form#form").submit(function(event){

    //disable the default form submission

    event.preventDefault();

    var formData    = $("#form").serialize();
    console.log(formData);


    if (true) {
      $.ajax({
        url: 'sign-up-traitement-ajax.php',
        type: 'POST',
        data: $("#form").serialize(),
        mimeType:"multipart/form-data",
        async: false,
        cache: false,
        processData: false,

        success: function(result)
        {
          if (jQuery.isEmptyObject(result) == false) {

            // alert(result);

            $( "#erreur" ).show();
            $('#erreur').html(result);

          } else {

            $( "#erreur" ).hide();

          }


          console.log(result);
        }

      });

    }else{
      $( "#erreur" ).show();

    }



    return false;
  });

});
