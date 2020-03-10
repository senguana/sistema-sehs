<?php 

$peticionAjax= true;
require_once '../core/configGeneral.php';
if (isset($_GET['Token'])) {
	require_once './../controllers/ControladorLogin.php';
	$logout = new ControladorLogin();
	echo $logout->cerrar_sesion_controlador();
}else{
	session_start(['name'=>'SEHS']); 
	session_start();
	session_destroy();
	echo '<script> window.location.href="'.SERVERURL.'admin/login/"</script>';
}

 ?>