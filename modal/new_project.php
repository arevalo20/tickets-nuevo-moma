<!-- Modal -->
<div class="row">
  <div class="col-12">
    <button type="button" class="btn btn-primary float-md-right" data-toggle="modal" data-target=".bs-example-modal-lg-new"><i class="fa fa-plus-circle"></i> Nuevo proyecto</button>
  </div>
</div>

<div class="modal fade bs-example-modal-lg-new" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Nuevo proyecto</h5>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      </div>

      <div class="modal-body">
        <form class="form-horizontal form-label-left input_mask" method="post" id="add" name="add">
          <div id="result"></div>

          <div class="row">
            <label class="control-label col-md-3 col-sm-3 col-xs-12 form-group">Nombre<span class="required">*</span></label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input type="text" required name="name" class="form-control" placeholder="Nombre del proyecto">
            </div>
          </div>


          <div class="row">
            <label class="control-label col-md-3 col-sm-3 col-xs-12 form-group">Descripción <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <textarea name="description" class="form-control" required></textarea>
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