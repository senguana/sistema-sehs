<?php include_once 'views/modal/ModalLibro.php'; ?>

<?php 
 require_once './controllers/ControladorLibro.php';
 $insLibro = new ControladorLibro();
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
        <h3>LIBROS</h3>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel ">
          <div class="x_title">
            <h2><i class="fa fa-bars"></i> Registro Libros</h2>
            <ul class="nav navbar-right panel_toolbox">
              <?php if ( $_SESSION['cuenta_tipo_sehs']<=2 &&  $_SESSION['privilegio_sehs']<=2): ?>
              <li><button type="button" class="btn btn-success" data-toggle="modal" data-target="#NuevoLibro"><i class="fa fa-plus"></i> Nuevo Libro</button>
              </li>
            <?php endif; ?>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">            
            <div class="tab-content">
              <div class="tab-pane fade show active" id="Activos" role="tabpanel" aria-labelledby="home-tab">
                <?php 
                   echo $insLibro->tabla_controlador_libro($_SESSION['privilegio_sehs'],  $_SESSION['cuenta_tipo_sehs']);
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/sehs/libros.js" type="text/javascript" charset="utf-8" async defer></script>