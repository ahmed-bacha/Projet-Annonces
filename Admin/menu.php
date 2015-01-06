<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="dashboard.php">Annonces Admin</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">

    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user"></i>
        <?php echo $adminM->login; ?>
        <b class="caret"></b>
      </a>
      <ul class="dropdown-menu">
        <li>
          <a href="admin-logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
        </li>
      </ul>
    </li>
  </ul>


  <!--
                **********************************
                        Sidebar Menu Items
                **********************************
  -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">

      <!-- Link 01 -->
      <li>
        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
      </li>

      <li>
        <a href="#" data-toggle="collapse" data-target="#demo">
          <i class="fa fa-fw fa-arrows-v">
          </i> Administration
          <i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="demo" class="collapse">
          <?php
          if(AdminC::isAdministrateur($adminM->login, $adminM->mdp) == true){
            ?>
            <li>
              <a href="admin-inscription.php">Inscription Admin </a>
            </li>
            <li>
              <a href="admin-liste.php">Liste Admin </a>
            </li>
          <?php
          }else{
          ?>

          <li>
            <a href="#">Dropdown Item</a>
          </li>

          <?php
          }
          ?>
        </ul>
      </li>

    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
