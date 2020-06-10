<?php
$title = "Reportes | ";
include "head.php";
include "sidebar.php";

$projects = mysqli_query($con, "select * from project");
$priorities = mysqli_query($con,  "select * from priority");
$statuses = mysqli_query($con, "select * from status");
$kinds = mysqli_query($con, "select * from kind");
?>


<div id="layoutSidenav_content">
  <!-- main -->
  <main>
    <div class="container-fluid">
      <div class="mt-4 mb-4">
        <div class="card">
          <div class="card-header">
            <h4>Reportes</h4>
          </div>

          <div class="card-body">
            <!-- form search -->
            <form class="form-horizontal" role="form">
              <input type="hidden" name="view" value="reports">
              <div class="form-group">
                <div class="row">

                  <div class="col-md-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-male"></i>
                        </div>
                      </div>
                      <select name="project_id" class="form-control">
                        <option value="">PROJECTO</option>
                        <?php foreach ($projects as $p) : ?>
                          <option value="<?php echo $p['id']; ?>" <?php if (isset($_GET["project_id"]) && $_GET["project_id"] == $p['id']) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $p['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-support"></i>
                        </div>
                      </div>
                      <select name="priority_id" class="form-control">
                        <option value="">PRIORIDAD</option>
                        <?php foreach ($priorities as $p) : ?>
                          <option value="<?php echo $p['id']; ?>" <?php if (isset($_GET["priority_id"]) && $_GET["priority_id"] == $p['id']) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $p['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </div>
                      </div>
                      <input type="date" name="start_at" value="<?php if (isset($_GET["start_at"]) && $_GET["start_at"] != "") {
                                                                  echo $_GET["start_at"];
                                                                } ?>" class="form-control" placeholder="Palabra clave">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </div>
                      </div>
                      <input type="date" name="finish_at" value="<?php if (isset($_GET["finish_at"]) && $_GET["finish_at"] != "") {
                                                                    echo $_GET["finish_at"];
                                                                  } ?>" class="form-control" placeholder="Palabra clave">
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group">
                <div class="row">

                  <div class="col-md-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-toggle-on"></i>
                        </div>
                      </div>
                      <select name="status_id" class="form-control">
                        <?php foreach ($statuses as $p) : ?>
                          <option value="<?php echo $p['id']; ?>" <?php if (isset($_GET["status_id"]) && $_GET["status_id"] == $p['id']) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $p['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">TIPO</div>
                      </div>
                      <select name="kind_id" class="form-control">
                        <?php foreach ($kinds as $p) : ?>
                          <option value="<?php echo $p['id']; ?>" <?php if (isset($_GET["kind_id"]) && $_GET["kind_id"] == $p['id']) {
                                                                    echo "selected";
                                                                  } ?>><?php echo $p['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <button class="btn btn-primary btn-block">Procesar</button>
                  </div>
                </div>
              </div>

            </form>
            <!-- end form search -->

            <?php
            $users = array();
            if ((isset($_GET["status_id"]) && isset($_GET["kind_id"]) && isset($_GET["project_id"]) && isset($_GET["priority_id"]) && isset($_GET["start_at"]) && isset($_GET["finish_at"])) && ($_GET["status_id"] != "" || $_GET["kind_id"] != "" || $_GET["project_id"] != "" || $_GET["priority_id"] != "" || ($_GET["start_at"] != "" && $_GET["finish_at"] != ""))) {
              $sql = "select * from ticket where ";
              if ($_GET["status_id"] != "") {
                $sql .= " status_id = " . $_GET["status_id"];
              }

              if ($_GET["kind_id"] != "") {
                if ($_GET["status_id"] != "") {
                  $sql .= " and ";
                }
                $sql .= " kind_id = " . $_GET["kind_id"];
              }


              if ($_GET["project_id"] != "") {
                if ($_GET["status_id"] != "" || $_GET["kind_id"] != "") {
                  $sql .= " and ";
                }
                $sql .= " project_id = " . $_GET["project_id"];
              }

              if ($_GET["priority_id"] != "") {
                if ($_GET["status_id"] != "" || $_GET["project_id"] != "" || $_GET["kind_id"] != "") {
                  $sql .= " and ";
                }

                $sql .= " priority_id = " . $_GET["priority_id"];
              }



              if ($_GET["start_at"] != "" && $_GET["finish_at"]) {
                if ($_GET["status_id"] != "" || $_GET["project_id"] != "" || $_GET["priority_id"] != "" || $_GET["kind_id"] != "") {
                  $sql .= " and ";
                }

                $sql .= " ( date_at >= \"" . $_GET["start_at"] . "\" and date_at <= \"" . $_GET["finish_at"] . "\" ) ";
              }

              $users = mysqli_query($con, $sql);
            } else {
              $users = mysqli_query($con, "select * from ticket order by created_at desc");
            }

            if (@mysqli_num_rows($users) > 0) {
              // si hay reportes
              $_SESSION["report_data"] = $users;
            ?>
              <div class="mt-3">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <th>Asunto</th>
                      <th>Proyecto</th>
                      <th>Tipo</th>
                      <th>Categoria</th>
                      <th>Prioridad</th>
                      <th>Estado</th>
                      <th>Fecha</th>
                      <th>Ultima Actualizacion</th>
                    </thead>
                    <?php
                    $total = 0;
                    foreach ($users as $user) {
                      $project_id = $user['project_id'];
                      $priority_id = $user['priority_id'];
                      $kind_id = $user['kind_id'];
                      $category_id = $user['category_id'];
                      $status_id = $user['status_id'];

                      $status = mysqli_query($con, "select * from status where id=$status_id");
                      $category = mysqli_query($con, "select * from category where id=$category_id");
                      $kinds = mysqli_query($con, "select * from kind where id=$kind_id");
                      $project  = mysqli_query($con, "select * from project where id=$project_id");
                      $medic = mysqli_query($con, "select * from priority where id=$priority_id");


                    ?>
                      <tr>
                        <td><?php echo $user['title'] ?></td>
                        <?php foreach ($project as $pro) { ?>
                          <td><?php echo $pro['name'] ?></td>
                        <?php } ?>
                        <?php foreach ($kinds as $kind) { ?>
                          <td><?php echo $kind['name'] ?></td>
                        <?php } ?>
                        <?php foreach ($category as $cat) { ?>
                          <td><?php echo $cat['name']; ?></td>
                        <?php } ?>
                        <?php foreach ($medic as $medics) { ?>
                          <td><?php echo $medics['name']; ?></td>
                        <?php } ?>
                        <?php foreach ($status as $stat) { ?>
                          <td><?php echo $stat['name']; ?></td>
                        <?php } ?>
                        <td><?php echo $user['created_at']; ?></td>
                        <td><?php echo $user['updated_at']; ?></td>
                      </tr>
                    <?php

                    }

                    ?>
                  <?php

                } else {
                  echo "<p class='alert alert-danger'>No hay tickets</p>";
                }


                  ?>
                  </table>

                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- /main -->

  <?php include "footer.php" ?>
</div>