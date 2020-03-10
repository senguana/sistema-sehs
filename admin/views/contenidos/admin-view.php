
<?php include_once 'views/modal/ModalAdmin.php'; ?>
<?php 
 require_once './controllers/ControladorAdministrador.php';
 $insAdmin = new ControladorAdministrador();
 ?>
 <?php 
 if ( $_SESSION['cuenta_tipo_sehs']!= 1) {
   echo $lc->forzar_cerrar_sesion_controlador();
 }
 ?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>ADMINISTRADORES</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
              <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#NuevoAdmin"><i class="fa fa-plus"></i> Nuevo</button>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
                <div class="col-sm-12">                
                  <?php 
                   $pagina = explode("/", $_GET['views']);
                   echo $insAdmin->paginador_administrador_controlador($pagina[0], 10,$_SESSION['privilegio_sehs'], $_SESSION['codigo_cuenta_sehs']);
                   ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
<script src="assets/js/sehs/admin.js" type="text/javascript" charset="utf-8" async defer></script>