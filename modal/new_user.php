<!-- Modal -->
<div class="row">
  <div class="col-12">
    <button type="button" class="btn btn-primary float-md-right" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Usuario</button>
  </div>
</div>

<div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      </div>

      <div class="modal-body">
        <form class="form-horizontal form-label-left input_mask" id="add_user" name="add_user">
          <div id="result_user"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
              <div class="mx-auto input-tickets input_user">
                <input name="username" required type="text" class="form-control input-log-tickets" placeholder="Usuario">
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="mx-auto input-tickets input_name">
                <input name="name" required type="text" class="form-control input-log-tickets" placeholder="Nombre">
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="mx-auto input-tickets input_name">
                <input name="lastname" type="text" class="form-control input-log-tickets" placeholder="Apellidos" required>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="input-tickets input_email">
                <input name="email" type="text" class="form-control input-log-tickets" placeholder="Correo Electronico" required>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="input-tickets input_status">
                <select class="form-control input-log-tickets" required name="status">
                  <option value="" selected>Selecciona estado</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="input-tickets input_psw">
                <input type="password" id="password" name="password" required class="form-control input-log-tickets">
              </div>
            </div>
          </div>

          <div class="ln_solid"></div>

          <div class="row">
            <div class="col-12 col-md-12 col-xs-12 col-md-offset-3">
              <button id="save_data" type="submit" class="btn btn-success float-md-right">Guardar</button>
            </div>
          </div>

        </form>

      </div>

      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div> -->

    </div>
  </div>
</div>
<!-- /Modal -->