<?php
$title = "Proyectos | ";
include "head.php";
include "sidebar.php";
?>

<div id="layoutSidenav_content">
  <!-- main -->
  <main>
    <div class="container-fluid">
      <div class="mt-4">
        <?php
        include("modal/new_project.php");
        // include("modal/upd_project.php");
        ?>
      </div>

      <div class="mt-4 mb-4">
        <div class="card">
          <div class="card-header">
            <h4>Proyectos</h4>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-12 col-md-8">
                <!-- Form search -->
                <form class="form-horizontal" role="form" id="ingresos">
                  <div class="form-group">
                    <div class="row">
                      <label for="q" class="control-label col-12 col-md-3 col-sm-3">Nombre</label>
                      <div class="col-12 col-md-6 col-sm-6">
                        <input type="text" class="form-control" id="q" placeholder="Nombre del proyecto" onkeyup='load(1);'>
                      </div>
                      <div class="col-md-3">
                        <button type="button" class="btn btn-primary" onclick='load(1);'>
                          <span class="glyphicon glyphicon-search"></span> Buscar</button>
                        <span id="loader" class="ml-3"></span>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- end Form search -->
              </div>
              <div class="col-md-2"></div>
            </div>

            <div class="table-responsive">
              <!-- ajax -->
              <div id="resultados"></div><!-- Carga los datos ajax -->
              <div class='outer_div'></div><!-- Carga los datos ajax -->
              <!-- /ajax -->
            </div>

          </div>
        </div>
      </div>

      <?php
      // include("modal/new_project.php");
      include("modal/upd_project.php");
      ?>
    </div>
  </main>

  <?php include "footer.php" ?>

</div><!-- /main -->

<script type="text/javascript" src="js/project.js"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script>
  $("#add").submit(function(event) {
    $('#save_data').attr("disabled", true);

    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "action/addproject.php",
      data: parametros,
      beforeSend: function(objeto) {
        $("#result").html("Mensaje: Cargando...");
      },
      success: function(datos) {
        $("#result").html(datos);
        $('#save_data').attr("disabled", false);
        load(1);
      }
    });
    event.preventDefault();
  })

  // success

  $("#upd").submit(function(event) {
    $('#upd_data').attr("disabled", true);

    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "action/updproject.php",
      data: parametros,
      beforeSend: function(objeto) {
        $("#result2").html("Mensaje: Cargando...");
      },
      success: function(datos) {
        $("#result2").html(datos);
        $('#upd_data').attr("disabled", false);
        load(1);
      }
    });
    event.preventDefault();
  })

  function obtener_datos(id) {
    var description = $("#description" + id).val();
    var name = $("#name" + id).val();
    $("#mod_id").val(id);
    $("#mod_description").val(description);
    $("#mod_name").val(name);
  }
</script>