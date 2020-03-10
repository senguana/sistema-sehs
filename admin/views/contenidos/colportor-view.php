<?php include_once 'views/modal/ModalColportor.php'; ?>
<?php 
 require_once './controllers/ControladorColportor.php';
 $colp = new ControladorColportor();
 ?>
  <?php 
 if ( $_SESSION['cuenta_tipo_sehs']>=3) {
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
            <div class="col-md-3 col-sm-9 ">
              <label>Seleccionar campaña:</label>
              <select class="form-control">
                <option>Linaje Real </option>
                <option>Option one</option>
                <option>Option two</option>
                <option>Option three</option>
                <option>Option four</option>
              </select>
            </div>
            <div class="col-md-3 col-sm-9 ">
              <label for="">Seleccionar provincia:</label>
              <select class="form-control">
                <option>Morona Santiago</option>
                <option>Option one</option>
                <option>Option two</option>
                <option>Option three</option>
                <option>Option four</option>
              </select>
            </div>
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
                   echo $colp->tabla_controlador_colportor($_SESSION['privilegio_sehs'],  $_SESSION['cuenta_tipo_sehs']);
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