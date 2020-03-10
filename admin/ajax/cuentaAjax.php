<?php 
 $peticionAjax= true;
 require_once '../core/configGeneral.php';
 if (isset($_POST['codigo']) || isset($_POST['codigoCuenta-up']) || isset($_POST['tipoCuenta-up']) ) {

 	require_once '../controllers/ControladorCuenta.php';
 	$insCuenta = new ControladorCuenta();

 	if (isset($_POST['codigo'])) {
 		$codigo = $_POST['codigo'];
 		$filesC = $insCuenta->datos_controlador_cuenta($codigo);
 		$campos = $filesC->fetch();

		echo json_encode($campos);
 	}

 	if (isset($_POST['codigoCuenta-up']) || isset($_POST['tipoCuenta-up']) || isset($_POST['usuario-up'])) {
 		echo $insCuenta->actualizar_controlador_cuenta();
 	}
 }

 ?>