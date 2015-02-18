
$( document ).ready(function() {

  $( "#erreur" ).hide();

  $("form#form").submit(function(event){

    //disable the default form submission

    event.preventDefault();

    var formData    = $("#form").serialize();
    console.log(formData);
    console.log($('#user').val());
    console.log($('#password').val());

    if (jQuery.isEmptyObject($('#password').val()) == false && jQuery.isEmptyObject($('#user').val()) == false ) {
      $.ajax({
        url: 'admin-login-traitement.php',
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

          console.log("tu passes ici");

        } else {
          document.location.href = '/Projet-annonces/Admin/liste-utilisateurs.php';
          $( "#erreur" ).hide();

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
