<?php require_once 'controllers/ControladorUsuario.php'; ?>
<?php
 $usuario = new ControladorUsuario();
 if ( $_SESSION['cuenta_tipo_sehs']!= 1) {
   echo $lc->forzar_cerrar_sesion_controlador();
 }
 ?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>ADMINISTRACIÓN DE USUARIOS</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-bars"></i> Registro Usuario</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="<?php echo SERVERURL; ?>admin/crear-usuario" class="btn btn-success"><i class="fa fa-user"></i> Nuevo Usaurio</a>
              
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                  <?php 
                    echo $usuario->tabla_controlador_usuario($_SESSION['privilegio_sehs'],  $_SESSION['cuenta_tipo_sehs']);
                   ?>
                </div>  
            </div>      
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/sehs/usuario.js" type="text/javascript" charset="utf-8" async defer></script>