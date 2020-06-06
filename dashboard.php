<?php
$title = "Dashboard - ";
include "head.php";
include "sidebar.php";

$TicketData = mysqli_query($con, "select * from ticket where status_id=1");
$ProjectData = mysqli_query($con, "select * from project");
$CategoryData = mysqli_query($con, "select * from category");
$UserData = mysqli_query($con, "select * from user order by created_at desc");
?>

<div id="layoutSidenav_content">

  <!-- main -->
  <main>

    <div class="container-fluid">
      <div class="mt-4">
        <div class="row">

          <div class="animated flipInY col-xl-3 col-sm-6 col-md-6">
            <div class="card bg-success text-white mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-3 col-sm-4 col-md-5 col-lg-3 d-flex align-items-center">
                    <i class="fa fa-ticket fa-4x"></i>
                  </div>
                  <div class="col-9 col-sm-8 col-md-7 col-lg-9 text-right">
                    <di class="huge">
                      <?php echo mysqli_num_rows($TicketData) ?>
                    </di>
                    <h6>Tickets Pendientes</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="animated flipInY col-xl-3 col-sm-6 col-md-6">
            <div class="card bg-primary text-white mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-3 col-sm-4 col-md-5 col-lg-3 d-flex align-items-center">
                    <i class="fa fa-list-alt fa-4x"></i>
                  </div>
                  <div class="col-9 col-sm-8 col-md-7 col-lg-9 text-right">
                    <div class="huge">
                      <?php echo mysqli_num_rows($ProjectData) ?>
                    </div>
                    <h6>Proyectos</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="animated flipInY col-xl-3 col-sm-6 col-md-6">
            <div class="card bg-danger text-white mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-3 col-sm-4 col-md-5 col-lg-3 d-flex align-items-center">
                    <i class="fa fa-th-list fa-4x"></i>
                  </div>
                  <div class="col-9 col-sm-8 col-md-7 col-lg-9 text-right">
                    <div class="huge">
                      <?php echo mysqli_num_rows($CategoryData) ?>
                    </div>
                    <h6>Categorias</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="animated flipInY col-xl-3 col-sm-6 col-md-6">
            <div class="card bg-warning text-white mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-3 col-sm-4 col-md-5 col-lg-3 d-flex align-items-center">
                    <i class="fa fa-users fa-4x"></i>
                  </div>
                  <div class="col-9 col-sm-8 col-md-7 col-lg-9 text-right">
                    <div class="huge">
                      <?php echo mysqli_num_rows($UserData) ?>
                    </div>
                    <h6>Usuarios</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content -->
      <div class="mt-4">
        <div class="row">
          <div class="col-md-2">
            <div class="image view view-first">
              <img class="thumb-image" style="width: 100%; display: block;" src="images/profiles/<?php echo $profile_pic; ?>" alt="image" />
            </div>
            <span class="btn btn-my-button btn-file">
              <form method="post" id="formulario" enctype="multipart/form-data">
                Cambiar Imagen de perfil: <input type="file" name="file">
              </form>
            </span>
            <div id="respuesta"></div>
          </div>
          <div class="col-md-10 col-xs-12 col-sm-12">
            <?php include "lib/alerts.php";
            profile(); //llamada a la funcion de alertas
            ?>
            <div class="card">
              <div class="card-header">
                <h4>Informacion personal</h4>
              </div>
              <div class="card-body">
                <div class="card-content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="action/upd_profile.php" method="post">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="name" id="first-name" class="form-control col-md-7 col-xs-12" value="<?php echo $name; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Correo electronico
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="last-name" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $email; ?>">
                      </div>
                    </div>

                    <br><br><br>
                    <h2 style="padding-left: 50px">Cambiar Contraseña</h2>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña antigua
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="birthday" name="password" class="date-picker form-control col-md-7 col-xs-12" type="text" placeholder="**********">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nueva contraseña
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="birthday" name="new_password" class="date-picker form-control col-md-7 col-xs-12" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirmar contraseña nueva
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="birthday" name="confirm_new_password" class="date-picker form-control col-md-7 col-xs-12" type="text">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="token" class="btn btn-success">Actualizar Datos</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
  <!-- main -->
  <?php include "footer.php" ?>

</div><!-- #layoutSidenav_conten -->

</div>


<script>
  $(function() {
    $("input[name='file']").on("change", function() {
      var formData = new FormData($("#formulario")[0]);
      var ruta = "action/upload-profile.php";
      $.ajax({
        url: ruta,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos) {
          $("#respuesta").html(datos);
        }
      });
    });
  });
</script>