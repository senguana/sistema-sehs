<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Permiso Usuario</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-bars"></i> Registro permiso usuario</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Nuevo</button>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div id="alert_message"></div>
            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Activos" role="tab" aria-controls="home" aria-selected="true">Activos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Inactivos" role="tab" aria-controls="profile" aria-selected="false">Inactivos</a>
              </li>
            </ul>
            <?php include_once 'views/modal/ModalPermisoUsuario.php'; ?>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="Activos" role="tabpanel" aria-labelledby="home-tab">
                <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                            <th>Nombre de campanña</th>
                            <th>Inicio de la campania</th>
                            <th>Inicio de la campania</th>
                            <th>Estado</th>
                            <th style="width: 2%">Acción</th>
                          </tr>
                        </thead>
                      <tbody></tbody>
                    </table>
                  </div>
              </div>
              <div class="tab-pane fade" id="Inactivos" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                            <th>Nombre de campanña</th>
                            <th>Inicio de la campania</th>
                            <th>Inicio de la campania</th>
                            <th>Estado</th>
                            <th style="width: 10%">Opciones</th>
                          </tr>
                        </thead>
                      <tbody></tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/sehs/funciones.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="assets/js/sehs/PermisoUsuario.js" type="text/javascript" charset="utf-8" async defer></script>
