
$( document ).ready(function() {

  $( "#erreur" ).hide();

  $("form#form").submit(function(event){

    //disable the default form submission

    event.preventDefault();

    var formData    = $("#form").serialize();
    console.log(formData);
    console.log($('#email').val());
    console.log($('#password').val());

    if (jQuery.isEmptyObject($('#password').val()) == false && jQuery.isEmptyObject($('#email').val()) == false ) {
      $.ajax({
        url: 'log-in-traitement-ajax.php',
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
      $('#erreur').html("Email ou mot de passe incorrects")
    }



    return false;
  });

});
