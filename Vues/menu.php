<div class="header-img row">

    <br>
    <a href="liste-annonces.php">
        <img class="col-lg-3 col-lg-offset-1" src="resources-img/logo_horiz.png" alt="">
    </a>


</div>



<div class="row">

    <nav role="navigation" class="navbar navbar-default ">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>



        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">

            <div class="col-lg-9"></div>

            <!-- <form role="search" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" placeholder="Search" class="form-control">
                </div>
                style="border:1px solid red;"
            </form> -->

            <ul class="nav navbar-nav navbar-right col-lg-3">

            <?php
            if (isset($userM)) {
                ?>

                <li>
                    <a href="liste-annonces.php">Annonces</a>
                </li>

                <li class="dropdown">

                  <a href="<?php echo 'profile.php?id='.$userM->id?>" class="dropdown-toggle" data-toggle="dropdown">

                      <span class="user">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"> <?php  echo $userM->nom ?></span>
                      </span>

                    <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="profile.php">Mon profile</a>
                      <a href="liste-mes-annonces.php">Liste de mes annonces</a>
                      <a href="add-annonce.php">Ajouter une annonce</a>
                    </li>

                    <li class="divider"></li>

                    <li>
                      <a href="log-out.php">Logout</a>
                    </li>
                  </ul>

                </li>

            <?php

            }else{
                ?>
                <li>
                    <a href="sign-up.php">Sign Up</a>
                </li>
                <li>
                    <a href="log-in.php">Login</a>
                </li>
            <?php
            }
             ?>
            </ul>
        </div>
    </div>

        <!-- Activation de la fonction DropDown du menu -->
        <script type="text/javascript">
        $('.dropdown-toggle').dropdown();
        </script>

    </nav>
</div>
