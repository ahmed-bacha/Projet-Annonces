
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
            document.location.href = '/Projet-annonces/Vues/liste-annonces.php';
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



$(function(){

  var email      = $('input[name="email"]');

  var password       = $('input[name="password"]');

  var submit      = $('button[name="submit"]');


  email.blur(function(){

    treatEmailField($(this));

  });

  email.focus(function(){

    setStandard($(this));

  });

  password.blur(function(){

    treatMdpField($(this))
  });

  password.focus(function(){

    setStandard($(this));

  });

  stateSubmitButton();

  //--------------------------------
  // function called during treatment
  //--------------------------------

  function setOk(element){

    element.closest('div').addClass('has-success');

    element.next().addClass('glyphicon-ok').show();

    stateSubmitButton();

  }

  function setKo(element){

    element.closest('div').addClass('has-error');

    element.next().addClass('glyphicon-remove').show();

    stateSubmitButton();

  }

  function setStandard(element){

    element.closest('div').removeClass().addClass('input-group has-feedback');

    element.next().removeClass().addClass('glyphicon form-control-feedback').hide();

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

  function treatEmailField(element){

    var email   = element.val();

    var regexp  = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

    var result  = regexp.test(email);

    if(result){

      setOk(element);

      hideError(element);

    } else {

      setKo(element);

      showError(element);

    }

  }

  function treatMdpField(element){

    if(element.val().length > 5){

      setOk(element);

      hideError(element);

    } else {

      setKo(element);

      showError(element);

    }

  }

  function disable(button){

    button.prop("disabled", true);

  }

  function able(button){

    button.prop("disabled", false);

  }

  function stateSubmitButton(){
    if ($('#divEmail').hasClass('has-success') && $('#divPassword').hasClass('has-success')) {
      console.log("has success");
      able(submit);
    } else {
      console.log("not success")
      disable(submit);
    }
  }
});
