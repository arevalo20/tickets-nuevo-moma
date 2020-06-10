<?php

include "../config/config.php"; //Contiene funcion que conecta a la base de datos

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if (isset($_GET['id'])) {
  $id_del = intval($_GET['id']);
  $query = mysqli_query($con, "SELECT * from category where id='" . $id_del . "'");
  $count = mysqli_num_rows($query);
  if ($delete1 = mysqli_query($con, "DELETE FROM category WHERE id='" . $id_del . "'")) {
?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Aviso!</strong> Datos eliminados exitosamente.
    </div>
  <?php
  } else {
  ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <strong>Error!</strong> No se pudo eliminar ésta categoria. Existen gastos vinculadas a ésta categoria.
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
  $aColumns = array('name'); //Columnas de busqueda
  $sTable = "category";
  $sWhere = "";
  if ($_GET['q'] != "") {
    $sWhere = "WHERE (";
    for ($i = 0; $i < count($aColumns); $i++) {
      $sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
    }
    $sWhere = substr_replace($sWhere, "", -3);
    $sWhere .= ')';
  }
  $sWhere .= " order by name desc";
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
  $reload = './categories.php';
  //main query to fetch the data
  $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
  $query = mysqli_query($con, $sql);
  //loop through fetched data
  if ($numrows > 0) {

?>
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr class="headings">
          <th class="column-title">Nombre Categoria </th>
          <th class="column-title no-link last">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($r = mysqli_fetch_array($query)) {
          $id = $r['id'];
          $name = $r['name'];
        ?>
          <input type="hidden" value="<?php echo $id; ?>" id="id<?php echo $id; ?>">
          <input type="hidden" value="<?php echo $name; ?>" id="name<?php echo $id; ?>">

          <tr class="even pointer">
            <td><?php echo $name; ?></td>
            <td><span class="float-right">
                <a href="#" class='btn btn-info' title='Editar producto' onclick="obtener_datos('<?php echo $id; ?>');" data-toggle="modal" data-target=".bs-example-modal-lg-udp"><i class="fas fa-pencil-alt"></i></a>
                <a href="#" class='btn btn-danger' title='Borrar producto' onclick="eliminar('<?php echo $id; ?>')"><i class="far fa-trash-alt"></i></a></span></td>
          </tr>
        <?php
        } //end while
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
      <strong>Aviso!</strong> No hay datos para mostrar
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php
  }
}
?>