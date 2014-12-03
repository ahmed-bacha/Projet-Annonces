      $( document ).ready(function() {

      $( "#erreur" ).hide();
      $( "#success" ).hide();

      $("form#form").submit(function(event){

        //disable the default form submission
        event.preventDefault();

        var formData    = new FormData($(this)[0]);
        // console.log(formData.toString());

        $.ajax({
          url: 'traitement-image.php',
          type: 'POST',
          data: formData,
          mimeType:"multipart/form-data",
          contentType: false,
          async: false,
          cache: false,
          processData: false,

          success: function(result)
          {
            if (jQuery.isEmptyObject(result) == false) {
              $( "#erreur" ).show();
              ( "#success" ).hide();
              $('#erreur').html(result);
            }else{
              $( "#erreur" ).hide();
              $( "#success" ).show();
              $( "#success" ).html("Annonce créée !!!");
              $("form#form").slideUp("slow");
            }

            console.log(result);
          }

        });


        return false;
      });


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
                });
