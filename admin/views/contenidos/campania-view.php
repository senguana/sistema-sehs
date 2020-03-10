<?php include_once 'views/modal/ModalCampania.php'; ?>

<?php 
 require_once './controllers/ControladorCampania.php';
 $insCamp = new ControladorCampania();
 ?>
  <?php 
 if ($_SESSION['cuenta_tipo_sehs']!= 1) {
   echo $lc->forzar_cerrar_sesion_controlador();
 }
 ?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Campaña</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-bars"></i> Registro Campaña</h2>
            <ul class="nav navbar-right panel_toolbox">
              <?php if ( $_SESSION['cuenta_tipo_sehs']<=2 &&  $_SESSION['privilegio_sehs']<=2): ?>
              <li><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Nuevo</button>
              </li>
            <?php endif; ?>
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
            
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="Activos" role="tabpanel" aria-labelledby="home-tab">
                <?php 
                   echo $insCamp->datos_controlador_campania_activos($_SESSION['privilegio_sehs'],  $_SESSION['cuenta_tipo_sehs']);
                ?>
              </div>
              <div class="tab-pane fade" id="Inactivos" role="tabpanel" aria-labelledby="profile-tab">
                <?php 
                   echo $insCamp->datos_controlador_campania_inactivos($_SESSION['privilegio_sehs'],  $_SESSION['cuenta_tipo_sehs']);
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/sehs/campania.js" type="text/javascript" charset="utf-8" async defer></script>