<?php 
 $peticionAjax= true;
 require_once '../core/configGeneral.php';
 if (isset($_POST['codigo_colportor-reg'])) {

 	require_once '../controllers/ControladorUsuario.php';
 	$insUsuario = new ControladorUsuario();

 	if (isset($_POST['codigo_colportor-reg']) || isset($_POST['usuario-reg']) || isset($_POST['contrasena-reg']) || isset($_POST['rol-reg']) ) {
 		echo $insUsuario->agregar_controlador_usuario();
 	}

 	if (isset($_POST['codigoCuenta-up']) || isset($_POST['tipoCuenta-up']) || isset($_POST['usuario-up'])) {
 		echo $insCuenta->actualizar_controlador_cuenta();
 	}
 }

 ?>