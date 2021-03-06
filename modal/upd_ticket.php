<?php
$projects = mysqli_query($con, "SELECT * FROM project");
$priorities = mysqli_query($con, "SELECT * FROM priority");
$statuses = mysqli_query($con, "SELECT * FROM status");
$kinds = mysqli_query($con, "SELECT * FROM kind");
$categories = mysqli_query($con, "SELECT * FROM category");
?>
<!-- Modal -->
<div class="modal fade bs-example-modal-lg-udp" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Editar Ticket</h5>
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal form-label-left input_mask" method="post" id="upd" name="upd">
					<div id="result2"></div>

					<input type="hidden" name="mod_id" id="mod_id">


					<div class="row form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo
						</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<select class="custom-select input-log-tickets" name="kind_id" required id="mod_kind_id">
								<?php foreach ($kinds as $p) : ?>
									<option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="row form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo<span class="required">*</span></label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" name="title" class="form-control input-log-tickets" placeholder="Titulo" id="mod_title" required>
						</div>
					</div>

					<div class="row form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción<span class="required">*</span>
						</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<textarea name="description" id="mod_description" class="form-control input-log-tickets" required></textarea>
						</div>
					</div>

					<div class="row form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Proyecto
						</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<select class="custom-select input-log-tickets" name="project_id" required id="mod_project_id">
								<option selected="" value="">Selecciona --</option>
								<?php foreach ($projects as $p) : ?>
									<option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="row form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Categoria
						</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<select class="custom-select input-log-tickets" name="category_id" required id="mod_category_id">
								<option selected="" value="">Selecciona --</option>
								<?php foreach ($categories as $p) : ?>
									<option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="row form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Prioridad
						</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<select class="custom-select input-log-tickets" name="priority_id" required id="mod_priority_id">
								<option selected="" value="">Selecciona --</option>
								<?php foreach ($priorities as $p) : ?>
									<option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="row form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado
						</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<select class="custom-select input-log-tickets" name="status_id" required id="mod_status_id">
								<option selected="" value="">Selecciona --</option>
								<?php foreach ($statuses as $p) : ?>
									<option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

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
</div> <!-- /Modal -->