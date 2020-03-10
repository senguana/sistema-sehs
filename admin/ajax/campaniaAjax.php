<?php 
 $peticionAjax= true;
 require_once '../core/configGeneral.php';
 if (isset($_POST['nombre_campania-reg']) || isset($_POST['codigo']) || isset($_POST['codigo_campania-up']) || isset($_POST['codigo-delete']) || isset($_POST['codigo_campania'])) {

 	require_once '../controllers/ControladorCampania.php';
 	$insCampania = new ControladorCampania();

 	if (isset($_POST['nombre_campania-reg']) && isset($_POST['fecha_inicio-reg']) && isset($_POST['fecha_fin-reg'])) {
 		echo $insCampania-> agregar_controlador_campania();
 	}

 	//capturar satos del administrador para actualiar
	if (isset($_POST['codigo'])) {
	
		$codigo=$_POST['codigo'];
		$filesA = $insCampania->datos_campania_controlador("Unico", $codigo);
		$campos = $filesA->fetch();

		echo json_encode($campos);
	}
//   actualiar Campania
	if (isset($_POST['codigo_campania-up']) && isset($_POST['nombre_campania-up'])) {
		echo $insCampania->actualizar_campania_controlador(); 
	}
	//eliminar la campaña
	if (isset($_POST['codigo-delete'])) {
		echo $insCampania->eliminar_campania_controlador();
	}

	//actuaziar el estado de la campaña
	if (isset($_POST['codigo_campania'])) {
		echo $insCampania->actualizar_estado_campania_controlador();
	}
 }

 ?>