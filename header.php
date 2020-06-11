<header>

  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-red-dark " role="navigation">

    <!-- <div class="navbar nav_title" style="border: 0;"> -->
    <a href="#" class="site_title navbar-brand"><i class="far fa-hand-peace"></i> <span>Soporte MOMA</span></a>
    <!-- </div> -->
    <!-- <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button> -->

    <div class="nav toggle order-lg-0 mr-0 ml-5 mt-1 ml-md-0 mr-md-0 my-md-0 order-lg-0">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>

    <ul class="d-none d-lg-inline-flex navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a href="#" class="user-profile nav-link" data-toggle="dropdown" aria-expanded="false">
          <img src="images/profiles/<?php echo $profile_pic; ?>" alt=""><?php echo $name; ?>
          <span class=" fa fa-angle-down"></span>
        </a>
        <div class="dropdown-menu sesion dropdown-menu-right rounded-0 shadow-lg border-0 m-0">
          <a class="dropdown-item" href="dashboard.php"><i class="fa fa-user"></i> Mi cuenta</a>
          <a class="dropdown-item sesion" href="action/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
        </div>
      </li>
    </ul>

    <ul class="d-lg-none d-inline-flex navbar-nav mr-0 mr-md-3 my-md-0">
      <li class="nav-item dropdown">
        <a href="#" class="user-profile nav-link pr-0" data-toggle="dropdown" aria-expanded="false">
          <img src="images/profiles/<?php echo $profile_pic; ?>" alt=""><!-- <?php echo $name; ?> -->
          <span class="fa fa-angle-down"></span>
        </a>
        <div class="dropdown-menu sesion dropdown-menu-right rounded-0 shadow-lg border-0 m-0">
          <a class="dropdown-item" href="dashboard.php"><i class="fa fa-user"></i> Mi cuenta</a>
          <a class="dropdown-item sesion" href="action/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
        </div>
      </li>
    </ul>

  </nav>

</header>