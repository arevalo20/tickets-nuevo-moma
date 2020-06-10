<?php
$title = "Categorias | ";
include "head.php";
include "sidebar.php";
?>

<div id="layoutSidenav_content">
  <!-- main -->
  <main>
    <div class="container-fluid">
      <div class="mt-4">
        <?php
        include("modal/new_category.php");
        // include("modal/upd_category.php");
        ?>
      </div>

      <div class="mt-4 mb-4">
        <div class="card">
          <div class="card-header">
            <h4>Categorias </h4>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-12 col-md-8">
                <!-- form search -->
                <form class="form-horizontal" role="form" id="category_expence">
                  <div class="form-group row">
                    <label for="q" class="control-label col-12 col-md-3 col-sm-3">Nombre</label>
                    <div class="col-12 col-md-6 col-sm-6">
                      <input type="text" class="form-control" id="q" placeholder="Nombre de la categoria" onkeyup='load(1);'>
                    </div>
                    <div class="col-md-3">
                      <button type="button" class="btn btn-primary" onclick='load(1);'>
                        <span class="glyphicon glyphicon-search"></span> Buscar</button>
                      <span id="loader"></span>
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
      // include("modal/new_category.php");
      include("modal/upd_category.php");
      ?>
    </div>
  </main>
  <!-- /main -->

  <?php include "footer.php" ?>

</div>



<script type="text/javascript" src="js/category.js"></script>

<script>
  $("#add").submit(function(event) {
    $('#save_data').attr("disabled", true);

    var parametros = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "action/addcategory.php",
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
      url: "action/updcategory.php",
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
    var name = $("#name" + id).val();
    $("#mod_id").val(id);
    $("#mod_name").val(name);
  }
</script>