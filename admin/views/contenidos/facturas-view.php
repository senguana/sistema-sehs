<?php include_once 'views/modal/ModalLibro.php'; ?>

<?php 
require_once 'controllers/ControladorNuevaFactura.php';
$filesNF = new ControladorNuevaFactura(); 
?>
  <?php 
 if ( $_SESSION['cuenta_tipo_sehs'] >=3) {
   echo $lc->forzar_cerrar_sesion_controlador();
 }
 ?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel ">
          <div class="x_title">
            <h2><i class="fa fa-bars"></i> Registros de pedidos</h2>
            <ul class="nav navbar-right panel_toolbox">
              <?php if ( $_SESSION['cuenta_tipo_sehs']<=2 &&  $_SESSION['privilegio_sehs']<=2): ?>
              <a href="<?php echo SERVERURL; ?>admin/nueva-factura" class="btn btn-success"><span class="glyphicon glyphicon-plus" ></span> Nuevo pedido</a>
              
            <?php endif; ?>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">            
            <div class="tab-content">
              
                <?php 
                echo $filesNF->paginador_controlador_pedido($_SESSION['privilegio_sehs'], $Nombre[0] . " " .$Apellido[0]);

                 ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/sehs/factura.js" type="text/javascript" charset="utf-8" async defer></script>