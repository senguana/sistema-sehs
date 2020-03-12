<?php include_once 'views/modal/ModalBuscarUsuario.php'; ?>
<?php include_once 'crear-gestionar-campania.php'; ?>
<?php 
 require_once './controllers/ControladorCampania.php';
 $camp = new ControladorCampania();
 ?>
<div class="right_col TablaGestionarCampania" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>GESTIONAR CAMPAÑA</h3>
      </div>
    </div>
    
    <div class="clearfix"></div>

    <div class="">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
         
          <div class="x_title">
            <h2><i class="fa fa-bars"></i> Registro permiso usuario</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><button type="button" class="btn btn-success cargarForm"><i class="fa fa-plus"></i> Asignar nuevo usuario</button>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php 
              echo $camp->tabla_controlador_campania_usuario($_SESSION['privilegio_sehs'],  $_SESSION['cuenta_tipo_sehs']);
             ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/sehs/gestionar-campania.js" type="text/javascript" charset="utf-8" async defer></script>
