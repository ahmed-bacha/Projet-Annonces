$( document ).ready(function() {

  $( "#erreur" ).hide();
  $( "#success" ).hide();

  $("form#form").submit(function(event){

    //disable the default form submission

    event.preventDefault();

    var formData    = $("#form").serialize();
    console.log(formData);
    console.log($('#current_pass').val());
    console.log($('#new_pass').val());
    console.log($('#confirm_new_pass').val());
    console.log($("#form").serialize());

    if (jQuery.isEmptyObject($('#current_pass').val()) == false && jQuery.isEmptyObject($('#new_pass').val()) == false && jQuery.isEmptyObject($('#confirm_new_pass').val()) == false) {
      $.ajax({
        url: 'modif-password-traitement-ajax.php',
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

          }else {
            document.location.href = '/Projet-annonces/Vues/profile.php?err=modiff_eff';
          $( "#success" ).show();
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

  var current_pass      = $('input[name="current_pass"]');

  var new_pass       = $('input[name="new_pass"]');

  var confirm_new_pass = $('input[name="confirm_new_pass"]');

  var submit      = $('button[name="submit"]');


  current_pass.blur(function(){

    treatMdpField($(this));

  });

  current_pass.focus(function(){

    setStandard($(this));

  });

  new_pass.blur(function(){

    treatMdpField($(this))
  });

  new_pass.focus(function(){

    setStandard($(this));

  });

    confirm_new_pass.blur(function(){

    treatMdpField($(this))
  });

  confirm_new_pass.focus(function(){

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
    if ($('#divCurrent_pass').hasClass('has-success') && $('#divNew_pass').hasClass('has-success') && $('#divConfirm_new_pass').hasClass('has-success')) {
      console.log("has success");
      able(submit);
    } else {
      console.log("not success")
      disable(submit);
    }
  }
});

