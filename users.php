<?php
$title = "Usuarios | ";
include "head.php";
include "sidebar.php";
?>

<div id="layoutSidenav_content">
  <!-- page content -->
  <main>
    <div class="container-fluid">
      <div class="mt-4">
        <?php
        include("modal/new_user.php");
        // include("modal/upd_user.php");
        ?>
      </div>

      <div class="mt-4 mb-4">
        <div class="card">
          <div class="card-header">
            <h4>Usuarios</h4>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-12 col-md-8">
                <!-- form search -->
                <form class="form-horizontal" role="form" id="datos_cotizacion">
                  <div class="form-group">
                    <div class="row">
                      <label for="q" class="control-label col-12 col-md-3 col-sm-3">Nombre o E-mail</label>
                      <div class="col-12 col-md-6 col-sm-6">
                        <input type="text" class="form-control" id="q" placeholder="Nombre o Correo Electrónico" onkeyup='load(1);'>
                      </div>
                      <div class="col-md-3">
                        <button type="button" class="btn btn-default" onclick='load(1);'>
                          <span class="glyphicon glyphicon-search"></span> Buscar</button>
                        <span id="loader" class="ml-3"></span>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- end form search -->
              </div>
              <div class="col-md-2"></div>
            </div>


            <div class="mt-3">
              <div class="table-responsive">
                <!-- ajax -->
                <div id="resultados"></div>
                <!-- Carga los datos ajax -->
                <div class='outer_div'></div>
                <!-- Carga los datos ajax -->
                <!-- /ajax -->
              </div>
            </div>

          </div>
        </div>
      </div>

      <?php
      // include("modal/new_user.php");
      include("modal/upd_user.php");
      ?>
    </div>
  </main>
  <!-- /page content -->

  <?php include "footer.php" ?>

</div>


<script type="text/javascript" src="js/users.js"></script>

<script>
  $("#add_user").submit(function(event) {
    $('#save_data').attr("disabled", true);

    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "action/add_user.php",
      data: parametros,
      beforeSend: function(objeto) {
        $("#result_user").html("Mensaje: Cargando...");
      },
      success: function(datos) {
        $("#result_user").html(datos);
        $('#save_data').attr("disabled", false);
        load(1);
      }
    });
    event.preventDefault();
  })

  // success

  $("#upd_user").submit(function(event) {
    $('#upd_data').attr("disabled", true);

    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "action/upd_user.php",
      data: parametros,
      beforeSend: function(objeto) {
        $("#result_user2").html("Mensaje: Cargando...");
      },
      success: function(datos) {
        $("#result_user2").html(datos);
        $('#upd_data').attr("disabled", false);
        load(1);
      }
    });
    event.preventDefault();
  })

  function obtener_datos(id) {
    var name = $("#name" + id).val();
    var email = $("#email" + id).val();
    var status = $("#status" + id).val();
    $("#mod_id").val(id);
    $("#mod_name").val(name);
    $("#mod_email").val(email);
    $("#mod_status").val(status);
  }
</script>