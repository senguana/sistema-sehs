<?php 
 $peticionAjax= true;
 require_once '../core/configGeneral.php';
 if (isset($_POST['dni-reg']) || isset($_POST['codigo']) || isset($_POST['codigo_delete']) || isset($_POST['id']) ) {

 	require_once '../controllers/ControladorColportor.php';
 	$insColpor = new ControladorColportor();

 	if (isset($_POST['dni-reg']) && isset($_POST['nombres-reg']) && isset($_POST['apellidos-reg']) && isset($_POST['genero-reg']) ) {
 		echo $insColpor-> agregar_controlador_colportor();
 	}

 	//capturar datos del administrador para ver
	if (isset($_POST['codigo'])) {
	
		$codigo=$_POST['codigo'];
		$filesA = $insColpor->datos_controlador_colportor("verDetalle", $codigo);
		$campos = $filesA->fetch();
		echo json_encode($campos);
	}
	//capturar datos para agregar
	if (isset($_POST['id'])) {
	    $json = array();
		$filesA = $insColpor->datos_controlador_colportor("traer_datos", 0);
		while ($campos = $filesA->fetch()) {
			$json[] = $campos;
		}
		echo json_encode($json);
	}
	
//   actualiar Campania
	if (isset($_POST['codigo_campania-up']) && isset($_POST['nombre_campania-up'])) {
		echo $insCampania->actualizar_campania_controlador(); 
	}
	//eliminar la campaña
	if (isset($_POST['codigo_delete'])) {
		echo $insColpor->eliminar_controlador_colportor();
	}


 }

 ?>