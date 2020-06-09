<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">

      <!-- <br /> -->

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="images/profiles/<?php echo $profile_pic; ?>" alt="<?php echo $name; ?>" class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Bienvenido,</span>
          <h2><?php echo $name; ?></h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <!-- sidebar menu -->
        <div class="menu_section">
          <ul class="nav side-menu">
            <li class="<?php if (isset($active1)) {
                          echo $active1;
                        } ?>">
              <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>

            <li class="<?php if (isset($active2)) {
                          echo $active2;
                        } ?>">
              <a href="tickets.php"><i class="fa fa-ticket"></i> Tickets</a>
            </li>

            <li class="<?php if (isset($active3)) {
                          echo $active3;
                        } ?>">
              <a href="projects.php"><i class="fa fa-list-alt"></i> Proyectos</a>
            </li>

            <li class="<?php if (isset($active4)) {
                          echo $active4;
                        } ?>">
              <a href="categories.php"><i class="fa fa-align-left"></i> Categorias</a>
            </li>

            <li class="<?php if (isset($active5)) {
                          echo $active5;
                        } ?>">
              <a href="reports.php"><i class="fa fa-area-chart"></i> Reportes</a>
            </li>

            <li class="<?php if (isset($active6)) {
                          echo $active6;
                        } ?>">
              <a href="users.php"><i class="fa fa-users"></i> Usuarios</a>
            </li>

            <li class="<?php if (isset($active8)) {
                          echo $active8;
                        } ?>">
              <a href="about.php"><i class="fa fa-child"></i> Sobre Mi</a>
            </li>

          </ul>
        </div>
      </div><!-- /sidebar menu -->
    </div>

    <div class="sb-sidenav-footer">
      <div class="small">Iniciada la sesión como:</div>
      <?php echo $name; ?>
    </div>
  </nav>
</div><!-- layoutSidenav_nav -->