<div class="row">
  <div class="col-12">
    <button type="button" class="btn btn-primary float-md-right" data-toggle="modal" data-target=".bs-example-modal-lg-new"><i class="fa fa-plus-circle"></i> Agregar Categoria</button>
  </div>
</div>

<div class="modal fade bs-example-modal-lg-new" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Nueva Categoria</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-left input_mask" method="post" id="add" name="add">
          <div id="result"></div>

          <div class="form-group">
            <div class="row">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*</span> </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input name="name" class="form-control" required type="text" placeholder="Nombre Categoria">
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
</div> <!-- /Modal -->