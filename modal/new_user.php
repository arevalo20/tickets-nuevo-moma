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
        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      </div>

      <div class="modal-body">
        <form class="form-horizontal form-label-left input_mask" id="add_user" name="add_user">
          <div id="result_user"></div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                  <label for="" class="control-label col-md-2 col-sm-2 col-xs-12"><i class="fa fa-user" aria-hidden="true"></i></label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input name="name" required type="text" class="form-control" placeholder="Nombre">
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                  <label for="" class="control-label col-md-2 col-sm-2 col-xs-12"><i class="fa fa-user" aria-hidden="true"></i></label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input name="lastname" type="text" class="form-control" placeholder="Apellidos" required>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                  <label for="" class="control-label col-md-2 col-sm-2 col-xs-12"><i class="fa fa-envelope" aria-hidden="true"></i></label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input name="email" type="text" class="form-control" placeholder="Correo Electronico" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" required name="status">
                  <option value="" selected>-- Selecciona estado --</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="password"><span class="required">*</span><i class="fas fa-key"></i></label>
                  <div class="col-md-10 col-sm-10 col-xs-12">
                    <input type="password" id="password" name="password" required class="form-control">
                  </div>
                </div>
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