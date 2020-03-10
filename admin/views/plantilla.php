
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <title><?php echo COMPANY; ?></title>
    
    
    <?php include_once './views/include/styles.php'; ?>
     <script type="text/javascript" src="<?php echo SERVERURL; ?>admin/assets/sweetalert2-1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo SERVERURL; ?>admin/assets/sweetalert2-1/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL; ?>admin/assets/sweetalert2-1/sweetalert/sweetalert2.min.css">
    <script type="text/javascript" src="<?php echo SERVERURL; ?>admin/assets/sweetalert2-1/sweetalert/sweetalert2.min.js" ></script>
    <script src="<?php echo SERVERURL; ?>admin/assets/js/main.js"></script>
    
    
  </head>

  <body class="nav-md">
    <?php     
       $peticionAjax= false;
       require_once './controllers/vistasControlador.php';
       $vt= new vistasControlador();
       $vistaR=$vt->obtener_vistas_controlador();

       if ($vistaR=="login" || $vistaR=="404"):

        if ($vistaR=="login") {
          require_once './views/contenidos/login-view.php';
        }else{
          require_once './views/contenidos/404-view.php';
        }
           
       else:
       session_start(['name'=>'SEHS']); 

        require_once './controllers/ControladorLogin.php'; 
        $lc = new ControladorLogin();
       if (!isset($_SESSION['usuario_sehs']) || !isset($_SESSION['token_sehs'])) {
         $lc->forzar_cerrar_sesion_controlador();
       }
    ?>
     
  <!-- Content page-->
   <div class="container body">
      <div class="main_container">
        <!-- menu lateral -->
        <?php include_once './views/include/menu_lateral.php'; ?>
        <!-- menu lateral -->
        <!-- top navigation -->
        <?php include_once './views/include/top-navigation.php'; ?>
        <!-- top navigation -->

      <div class="RespuestaAjax"></div>
        <!-- Content page -->
        <?php 
        require_once 'models/ModeloFunciones.php'; 
        $listarFuncion = new ModeloFunciones();
        $listarMision = $listarFuncion->listarMision(); 
        $listarMision1 = $listarFuncion->listarMision(); 
        $listarPais    = $listarFuncion->listarPais();
        $listarPais1    = $listarFuncion->listarPais();
        $selectLibro    = $listarFuncion->listarLibro();
        ?>
        <?php require_once $vistaR; ?>
        
     <!-- footer content --> 
        <footer>
          <div class="pull-right">
            SEHS - Bootstrap Admin Template by <a href="">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <?php include_once 'views/include/logoutScript.php'; ?>
    <?php endif; ?>
   <?php include_once './views/include/scripts.php'; ?>
   
  
  </body>
</html>

