<?php

include "../config/config.php"; //Contiene funcion que conecta a la base de datos

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if (isset($_GET['id'])) {
	$id_del = intval($_GET['id']);
	$query = mysqli_query($con, "SELECT * FROM ticket WHERE id='" . $id_del . "'");
	$count = mysqli_num_rows($query);

	if ($delete1 = mysqli_query($con, "DELETE FROM ticket WHERE id='" . $id_del . "'")) {
?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<strong>Aviso!</strong> Datos eliminados exitosamente.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
	<?php
	} else {
	?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
<?php
	} //end else
} //end if
?>

<?php
if ($action == 'ajax') {
	// escaping, additionally removing everything that could be (html/javascript-) code
	$q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
	$aColumns = array('title'); //Columnas de busqueda
	$sTable = "ticket";
	$sWhere = "";
	if ($_GET['q'] != "") {
		$sWhere = "WHERE (";
		for ($i = 0; $i < count($aColumns); $i++) {
			$sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
		}
		$sWhere = substr_replace($sWhere, "", -3);
		$sWhere .= ')';
	}
	$sWhere .= " order by created_at desc";
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$per_page = 10; //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
	$row = mysqli_fetch_array($count_query);
	$numrows = $row['numrows'];
	$total_pages = ceil($numrows / $per_page);
	$reload = './expences.php';
	//main query to fetch the data
	$sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
	$query = mysqli_query($con, $sql);
	//loop through fetched data
	if ($numrows > 0) {

?>
		<table class="table table-striped table-hover">
			<thead class="thead-dark">
				<tr class="headings">
					<th class="column-title">ID</th>
					<th class="column-title">Nombre</th>
					<th class="column-title">Proyecto</th>
					<th class="column-title">Descripción</th>
					<th class="column-title">Prioridad</th>
					<th class="column-title">Estado</th>
					<th class="column-title">Fecha de creacción</th>
					<th class="column-title no-link last">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($r = mysqli_fetch_array($query)) {
					$id = $r['id'];
					$created_at = date('d/m/Y', strtotime($r['created_at']));
					$description = $r['description'];
					$title = $r['title'];
					$project_id = $r['project_id'];
					$priority_id = $r['priority_id'];
					$status_id = $r['status_id'];
					$kind_id = $r['kind_id'];
					$category_id = $r['category_id'];

					$sql = mysqli_query($con, "SELECT * FROM project WHERE id=$project_id");
					if ($c = mysqli_fetch_array($sql)) {
						$name_project = $c['name'];
					}

					$sql = mysqli_query($con, "SELECT * FROM priority WHERE id=$priority_id");
					if ($c = mysqli_fetch_array($sql)) {
						$name_priority = $c['name'];
					}

					$sql = mysqli_query($con, "SELECT * FROM status WHERE id=$status_id");
					if ($c = mysqli_fetch_array($sql)) {
						$name_status = $c['name'];
					}

				?>

					<tr class="even pointer">
						<!-- me obtiene los datos -->
						<input type="hidden" value="<?php echo $id; ?>" id="id<?php echo $id; ?>">
						<input type="hidden" value="<?php echo $title; ?>" id="title<?php echo $id; ?>">
						<input type="hidden" value="<?php echo $description; ?>" id="description<?php echo $id; ?>">
						<input type="hidden" value="<?php echo $kind_id; ?>" id="kind_id<?php echo $id; ?>">
						<input type="hidden" value="<?php echo $project_id; ?>" id="project_id<?php echo $id; ?>">
						<input type="hidden" value="<?php echo $category_id; ?>" id="category_id<?php echo $id; ?>">
						<input type="hidden" value="<?php echo $priority_id; ?>" id="priority_id<?php echo $id; ?>">
						<input type="hidden" value="<?php echo $status_id; ?>" id="status_id<?php echo $id; ?>">
						<td><?php echo $id; ?></td>
						<td><?php echo $title; ?></td>
						<td><?php echo $name_project; ?></td>
						<td><?php echo $description; ?></td>
						<td><?php echo $name_priority; ?></td>
						<td><?php echo $name_status; ?></td>
						<td><?php echo $created_at; ?></td>
						<td>
							<span class="float-right">
								<a href="#" class='btn btn-info' title='Editar producto' onclick="obtener_datos('<?php echo $id; ?>');" data-toggle="modal" data-target=".bs-example-modal-lg-udp"><i class="fas fa-pencil-alt"></i></a>
								<a href="#" class='btn btn-danger' title='Borrar producto' onclick="eliminar('<?php echo $id; ?>')"><i class="far fa-trash-alt"></i></a>
							</span>
						</td>
					</tr>
				<?php
				} //en while
				?>
		</table>

		<div class="mb-3">
			<?php echo paginate($reload, $page, $total_pages, $adjacents); ?>
		</div>

		</div>
	<?php
	} else {
	?>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<strong>Aviso!</strong> No hay datos para mostrar!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
<?php
	}
}
?>