<?php 
 $peticionAjax= true;
 require_once '../core/configGeneral.php';
 if (isset($_POST['codigo_colportor-reg'])|| isset($_POST['codigo_cuenta_up']) || isset($_POST['codigo_cuenta_pass'])) {

 	require_once '../controllers/ControladorUsuario.php';
 	$insUsuario = new ControladorUsuario();

 	if (isset($_POST['codigo_colportor-reg']) || isset($_POST['usuario-reg']) || isset($_POST['contrasena-reg']) || isset($_POST['rol-reg']) ) {
 		echo $insUsuario->agregar_controlador_usuario();
 	}

 	if (isset($_POST['codigo_cuenta_up'])) {
 		echo $insUsuario->actualizar_controlador_usuario_user();
 	}
 	if (isset($_POST['codigo_cuenta_pass']) && isset($_POST['passwordA'])) {
 		echo $insUsuario->actualizar_controlador_usuario_pass();
 	}
 }

 ?>