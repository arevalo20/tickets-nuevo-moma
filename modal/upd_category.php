<!-- Modal -->
<div class="modal fade bs-example-modal-lg-udp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Editar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-left input_mask" method="post" id="upd" name="upd">
          <div id="result2"></div>
          <input type="hidden" name="mod_id" id="mod_id">

          <!-- <div class="form-group"> -->
          <div class="row">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*</span>
            </label>
            <div class="col-md-8 col-sm-8 col-xs-12">
              <input name="mod_name" id="mod_name" class="form-control" required type="text" placeholder="Nombre Categoria">
            </div>
          </div>
          <!-- </div> -->

          <div class="ln_solid"></div>

          <div class="row">
            <div class="col-12 col-md-12 col-xs-12 col-md-offset-3">
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
</div>
<!-- /Modal -->