<nav role="navigation" class="navbar navbar-default">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">TSE Annonces</a>
    </div>


    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">

            <li class="active">
                <a href="#">
                    <span class="glyphicon glyphicon-home">
                    </span>
                </a>
            </li>
        </ul>

        <form role="search" class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" placeholder="Search" class="form-control">
            </div>
        </form>

        <ul class="nav navbar-nav navbar-right">


        <!-- BLOC DES VUES  -->

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Vues
                <span class="caret"></span>
            </a>
          <ul class="dropdown-menu" role="menu">
            <li>
                <a href="single-annonce.php">Annonces</a>
                <a href="reponse-annonce.php">Reponse annonce</a>
                <a href="add-annonce.php">Add annonce</a>
                <a href="detail-annonce.php">Detail annonce</a>
                <a href="test-upload-image.php">Test Upload image</a>
            </li>
          </ul>
        </li>

        <!-- Activation de la fonction DropDown du menu -->
        <script type="text/javascript">
            $('.dropdown-toggle').dropdown();
        </script>

        <!-- END BLOC DES VUES  -->

        <?php
        if (isset($userM)) {
            ?>
            <li>
                <?php echo '<a href="profile.php?id='.$userM->id.'">' ."Bonjour : ".$userM->nom.'</a>'; ?>
            </li>
            <li>
                <a href="log-out.php">Logout</a>
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
</nav>
