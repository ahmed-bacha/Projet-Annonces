$(function(){

  $('.delete-user').click(function(){

    var currentItem = $(this);

    var _tab = currentItem.attr('href').split(/=/);

    console.log(_tab);

    var _userIndex = _tab[1];

    console.log(_userIndex);

    $.ajax({

      url :           'delete-utilisateur.php',

      type :          'GET',

      dataType :      'json',

      data :          'idUtilisateur='+_userIndex,

      success : function(reponse, statut){

        if(reponse){

          currentItem.closest('tr').remove();

          $('.alert-warning').slideDown('normal');

          setInterval(function(){

            $('.alert-warning').slideUp('normal');

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
