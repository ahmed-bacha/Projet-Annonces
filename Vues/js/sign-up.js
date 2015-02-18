
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


$(function(){

  var nom         = $('input[name="nom"]');

  var email      = $('input[name="email"]');

  var password1       = $('input[name="password"]');

  var password2      = $('input[name="password_confirme"]');

  var submit      = $('button[name="submit"]');


  //--------------------------------
  // treatment
  //--------------------------------

  nom.blur(function(){

    treatField($(this));

  });

  nom.focus(function(){

    setStandard($(this));

  });

  email.blur(function(){

    treatEmailField($(this));
  });

  email.focus(function(){

    setStandard($(this));

  });

  password1.blur(function(){

    treatMdp1Field($(this))
  });

  password1.focus(function(){

    setStandard($(this));

  });

  password2.blur(function(){

    treatMdp2Field($(this))
  });

  password2.focus(function(){

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

  function treatMdp1Field(element){

    if(element.val().length > 5){

      setOk(element);

      hideError(element);

    } else {

      setKo(element);

      showError(element);

    }

  }

  function treatMdp2Field(element){

    if(element.val() == password1.val() && element.val().length > 5){

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
    if ($('#divNom').hasClass('has-success') && $('#divEmail').hasClass('has-success') && $('#divMdp1').hasClass('has-success') && $('#divMdp2').hasClass('has-success')) {

        able(submit);

      } else {

        disable(submit);

      }
    }


  });
