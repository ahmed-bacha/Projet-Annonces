<!DOCTYPE html>
<html lang="FR">

<head>

  <meta charset="utf-8">

  <title>Espace Admin - Login</title>

  <!-- Bootstrap Core CSS -->
  <link href="../Vues/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Admin CSS -->
  <link href="../Vues/css/sb-admin.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../Vues/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- jQuery -->
  <script src="../Vues/js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="../Vues/js/bootstrap.min.js"></script>

  <script src="js/admin-login.js"></script>


</head>

<body style="background:rgb(34,34,34);">


  <div class="container-fluid">

    <div class="col-lg-8 col-lg-offset-2">

      <div class="panel panel-primary">
        <div class="panel-heading">
          <p class="text-center">
            Espace Admin - Login
          </p>
        </div>

        <div class="panel-body">
          <!--
            <mark>
              User : Admin - Password : Admin <br>
              Le Logout Fonctionne dans l'espace Admin (en haut à droite)
            </mark>
          -->
            <div class="form-group col-lg-6 col-lg-offset-3" >
              <div id ="erreur" class="alert alert-danger" role="alert" hidden="true">
              </div>
            </div>
          <form id="form" action="admin-login-traitement.php" method="POST">

            <!--  User Field -->
            <div class="form-group col-lg-8 col-lg-offset-3" >

              <label for="user">Utilisateur</label>
              <div id="divUser" class="input-group col-lg-8">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-user"></span>
                </div>

                <input type="text" id="user" name="user" class="form-control"  placeholder="admin-name">
                <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>

              </div>
            </div>

            <div class="alert alert-danger text-center" role="alert" hidden="true">Utilisateur non valide</div>


            <!-- Password Field -->
            <div class="form-group col-lg-8 col-lg-offset-3">
              <label for="password">Mot de passe</label>

              <div id="divPassword" class="input-group col-lg-8">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-lock"></span>
                </div>
                <input id="password" name="password" type="password" class="form-control" id="password" placeholder="*********">
                <span class="glyphicon form-control-feedback" hidden="true" aria-hidden="true"></span>
              </div>

            </div>

            <div class="alert alert-danger text-center" role="alert" hidden="true">MDP non valide</div>

            <div class="form-group col-lg-4 col-lg-offset-4">
              <button name="submit" id="submit" type="submit" class="btn btn-primary btn-block">Valider</button>
            </div>

          </form>

        </div>

      </div>
    </div>

  </div>
  <!-- /.container-fluid -->





  </script>

</body>

</html>
