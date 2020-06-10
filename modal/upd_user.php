<div class="modal fade bs-example-modal-lg-upd" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">

        <form class="form-horizontal form-label-left input_mask" id="upd_user" name="upd_user">

          <div id="result_user2"></div>

          <input type="hidden" id="mod_id" name="mod_id">

          <div class="row mx-auto">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
              <div class="input-tickets input_user">
                <input name="mod_username" id="mod_username" type="text" class="form-control input-log-tickets" required>
              </div>
            </div>
          </div>

          <div class="row mx-auto">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="input-tickets input_name">
                <input name="mod_name" id="mod_name" type="text" class="form-control input-log-tickets" required>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="input-tickets input_email">
                <input name="mod_email" id="mod_email" type="text" class="form-control input-log-tickets" required>
              </div>
            </div>
          </div>

          <div class="row mx-auto">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="input-tickets input_status">
                <select class="form-control input-log-tickets" required name="mod_status" id="mod_status">
                  <option value="" selected>Selecciona estado</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <div class="input-tickets input_psw">
                <input type="password" id="password" name="password" class="form-control input-log-tickets">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-md-12 col-md-offset-33">
              <small>
                <p class="text-muted text-center">La contraseña solo se modificara si escribes algo, en caso contrario no se modifica.</p>
              </small>
            </div>
          </div>

          <div class="ln_solid"></div>

          <div class="row">
            <div class="col-12 col-md-12 col-xs-12 col-md-offset-33">
              <button id="upd_data" type="submit" class="btn btn-success float-md-right">Guardar</button>
            </div>
          </div>

        </form>
      </div>

      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div> -->
    </div>
  </div>
</div> <!-- /Modal -->