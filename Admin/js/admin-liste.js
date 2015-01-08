$(function(){

  $('.deleteAdmin').click(function(){

    var currentItem = $(this);

    var _tab = currentItem.attr('href').split(/=/);

    var _adminIndex = _tab[1];

    $.ajax({

      url : 'delete-admin.php',

      type : 'GET',

      dataType : 'json',

      data : 'idAdmin='+_adminIndex,

      success : function(reponse, statut){

        if(reponse){

          currentItem.closest('tr').remove();

          $('.alert-success').slideDown('normal');

          setInterval(function(){

            $('.alert-success').slideUp('normal');

          },

          1500);

        } else {

          $('.alert-danger').slideDown('normal');

          setInterval(function(){

            $('.alert-danger').slideUp('normal');

          },

          1500);

        }

      }

    });

    return false;

  });

});
