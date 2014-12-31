// JQuery start ------------------------------------------------

$( document ).ready(function() {

  $( "#erreur" ).hide();
  $( "#success" ).hide();

  // fonction start---------------------------------------------
  $("form#form").submit(function(event){

    //disable the default form submission
    event.preventDefault();

    var formData = new FormData($(this)[0]);

    // console.log(formData.toString());

    // ajax request---------------------------------------------

    $.ajax({
      url: 'traitement-image.php',
      type: 'POST',
      data: formData,
      mimeType:"multipart/form-data",
      contentType: false,
      async: false,
      cache: false,
      processData: false,

      success: function(result){

        if (jQuery.isEmptyObject(result) == false) {

          // alert(result);

          $( "#erreur" ).show();
          $( "#success" ).hide();
          $('#erreur').html(result);

        } else {

          $( "#erreur" ).hide();
          $( "#success" ).show();
          $( "#success" ).html("Annonce créée !!!");
          $("form#form").slideUp("slow");

        }

        console.log(result);

    }

  });

  // end of ajax request--------------------------------------

  return false;

  });

  // fonction end --------------------------------------------

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

  // fonction start ------------------------------------------

  function imageIsLoaded1(e) {

    $('#img1').attr('src', e.target.result);

  };

  // fonction end --------------------------------------------

  // fonction start ------------------------------------------

  $("#file2").change(function() {

    var file = this.files[0];
    console.log(file);
    var imagefile = file.type;
    //alert(imagefile);
    var match= ["image/jpeg","image/png","image/jpg"];

    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
        return false;
    } else {

        var reader = new FileReader();

        reader.onload = imageIsLoaded2;

        reader.readAsDataURL(this.files[0]);

    }

  });

  // fonction end --------------------------------------------

  // fonction start ------------------------------------------

  function imageIsLoaded2(e) {

      $('#img2').attr('src', e.target.result);

  };

  // fonction end --------------------------------------------

  // fonction start ------------------------------------------

  $("#file3").change(function() {

    var file = this.files[0];
    console.log(file);
    var imagefile = file.type;
    //alert(imagefile);
    var match= ["image/jpeg","image/png","image/jpg"];

    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){

        return false;

    } else {

        var reader = new FileReader();

        reader.onload = imageIsLoaded3;

        reader.readAsDataURL(this.files[0]);

    }

  });

  // fonction end --------------------------------------------

  // fonction start ------------------------------------------

  function imageIsLoaded3(e) {

    $('#img3').attr('src', e.target.result);

  };

  // fonction end --------------------------------------------

  // fonction end --------------------------------------------

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

  // fonction end --------------------------------------------

});


$(function(){

  $('.alert-danger').hide();

  $('.alert-success').hide();

  //--------------------------------
  // global variable declaration
  //--------------------------------

  var nom         = $('input[name="nom"]');

  var prenom      = $('input[name="prenom"]');

  var telephone   = $('input[name="telephone"]');

  var titre       = $('input[name="titre"]');

  var prix        = $('input[name="prix"]');

  var description = $('textarea[name="description"]');

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

  prenom.blur(function(){

    treatField($(this));

  });

  prenom.focus(function(){

    setStandard($(this));

  });

  telephone.blur(function(){

    treatPhoneField($(this));

  });

  telephone.focus(function(){

    setStandard($(this));

  });

  titre.blur(function(){

    treatField($(this));

  });

  titre.focus(function(){

    setStandard($(this));

  });

  prix.blur(function(){

    treatPriceField($(this));

  });

  prix.focus(function(){

    setStandard($(this));

  });

  description.blur(function(){

    treatDescriptionField($(this));

  });

  description.focus(function(){

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

  function treatPhoneField(element){

    var phone   = element.val();

    var regexp  = /[0-9]{10}/;

    var result  = regexp.test(phone);

    if(result){

      setOk(element);

      hideError(element);

    } else {

      setKo(element);

      showError(element);

    }

  }

  function treatPriceField(element){

    var elementVal = element.val();

    var elementLength = elementVal.length;

    if(($.isNumeric(elementVal)) && elementLength != 0){

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
    if (  $('#nom').hasClass('has-success')        &&
      $('#prenom').hasClass('has-success')     &&
      $('#telephone').hasClass('has-success')  &&
      $('#titre').hasClass('has-success')      &&
      $('#prix').hasClass('has-success')       &&
      $('#description').hasClass('has-success') ) {


        console.log("has success");
        able(submit);

      } else {
        console.log("no success");
        disable(submit);

      }
    }



  });

// JQuery end --------------------------------------------
