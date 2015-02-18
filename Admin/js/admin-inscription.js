
$(document).ready(function() {

  $( "#erreur" ).hide();
  $( "#success" ).hide();

  $("form#form").submit(function(event){

    //disable the default form submission

    event.preventDefault();

    var formData    = $("#form").serialize();
    console.log(formData);
    console.log($('#login').val());
    console.log($('#password1').val());
    console.log($('#password2').val());

    if (jQuery.isEmptyObject($('#login').val()) == false && jQuery.isEmptyObject($('#password1').val()) == false && jQuery.isEmptyObject($('#password2').val()) == false ) {
      $.ajax({
        url: 'admin-inscription-traitement.php',
        type: 'POST',
        data: $("#form").serialize(),
        mimeType:"multipart/form-data",
        async: false,
        cache: false,
        processData: false,

        success: function(result)
      {
        if (jQuery.isEmptyObject(result) == false) {

          $( "#erreur" ).show();
          $('#erreur').html(result);

        } else {
          $( "#success" ).show();
          $( "#erreur" ).hide();
          $( "#submit" ).prop("disabled", true);
        }


        console.log(result);
      }

    });

  }else{
    $( "#erreur" ).show();
    $('#erreur').html("Login ou mot de passe incorrects")
  }



  return false;
});

});
