<?php include_once 'views/modal/ModalColportor.php'; ?>
<?php 
 require_once './controllers/ControladorColportor.php';
 $colp = new ControladorColportor();
 ?>
  <?php 
 if ( $_SESSION['cuenta_tipo_sehs']!=2 ) {
   echo $lc->forzar_cerrar_sesion_controlador();
 }
 ?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Colportores</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
              <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#NuevoColportor"><i class="fa fa-plus"></i> Nuevo colportor</button>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                  
                   <?php 
                   echo $colp->tabla_controlador_colportor($_SESSION['privilegio_sehs'],  $_SESSION['cuenta_tipo_sehs'], $_SESSION['ColportorProvincia']);
                ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/sehs/colportor.js" type="text/javascript" charset="utf-8" async defer></script> 