// JQuery start ------------------------------------------------

$( document ).ready(function() {

  $( "#erreur" ).hide();
  $( "#success" ).hide();

  // fonction start---------------------------------------------
  $("form#form").submit(function(event){

    //disable the default form submission
    event.preventDefault();

    var formData = $("#form").serialize();;

    // console.log(formData.toString());

    // ajax request---------------------------------------------

    $.ajax({    
      url:          'mail-traitement.php',
      type:         'POST',
      data:         formData,
      mimeType:     "form-data",
      async:        false,
      cache:        false,
      processData:  false,

      success: function(result){

        if (jQuery.isEmptyObject(result) == false) {

          $( "#erreur" ).show();
          $( "#success" ).hide();
          $('#erreur').html(result);

        } else {

          $( "#erreur" ).hide();
          $( "#responseButton" ).hide();
          $( "#success" ).show();
          $( "#success" ).html("<p class=\"text-center\">Email envoyé</p>");
          $("form#form").slideUp(2000); 

        }

        console.log(result);

    }

  });

  // end of ajax request--------------------------------------

  return false;

});

  // fonction end --------------------------------------------
});

$(function(){

  $('.alert-danger').hide();

  $('.alert-success').hide();

  //--------------------------------
  // global variable declaration
  //--------------------------------

  var nom         = $('input[name="nom"]');

  var email       = $('input[name="email"]');

  var text        = $('textarea[name="text"]');

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

  text.blur(function(){

    treatDescriptionField($(this));

  });

  text.focus(function(){

    setStandardTextarea($(this));

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

  function treatEmailField(element){

    var email   = element.val();

    var regexp  = /([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/;

    var result  = regexp.test(email);

    if(result){

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


  function stateSubmitButton(){
    if ( $('#divNom').hasClass('has-success') && $('#divEmail').hasClass('has-success') && $('#divText').hasClass('has-success')) {

        able(submit);

      } else {

        disable(submit);

      }
    }



  });

// JQuery end --------------------------------------------
