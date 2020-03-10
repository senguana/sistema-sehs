<?php 
 $peticionAjax= true;
 require_once '../core/configGeneral.php';
 if (isset($_POST['nombre_libro-reg']) || isset($_POST['codigo'])||isset($_POST['codigo-delete']) || isset($_POST['codigo_libro-up']) || isset($_POST['idLibro']) ||  isset($_POST['libroId']) ) {

 	require_once '../controllers/ControladorLibro.php';
 	$insLibro = new ControladorLibro();

 	if (isset($_POST['nombre_libro-reg']) && isset($_POST['precio-reg'])) {
 		echo $insLibro-> agregar_controlador_libro();
 	}

 	//capturar satos del administrador para actualiar
	if (isset($_POST['codigo'])) {
	
		$codigo=$_POST['codigo'];
		$filesA = $insLibro->datos_controlador_libro("Unico", $codigo);
		$campos = $filesA->fetch();

		echo json_encode($campos);
	}

	//capturar datos libro para agregar
	if (isset($_POST['idLibro'])) {
		$filesA = $insLibro->datos_controlador_libro("traer_datos_libro", 0);
		while ($campos = $filesA->fetch()) {
			$json[] = $campos;
		}
		echo json_encode($json);
	}
	if (isset($_POST['libroId'])) {
	    $libroId = $_POST['libroId'];
		$filesA = $insLibro->datos_controlador_libro("datos_libro", $libroId);
		if ($filesA->rowCount()>0) {
			$campos = $filesA->fetch();
		}
		echo json_encode($campos);
	}
//   actualiar libro
	if (isset($_POST['codigo_libro-up']) && isset($_POST['nombre_libro-up'])) {
		echo $insLibro->actualizar_controlador_libro(); 
	}
	//eliminar el libro
	if (isset($_POST['codigo-delete'])) {
		echo $insLibro->eliminar_controlador_libro();
	}

	//actuaziar el estado de la campaña
	if (isset($_POST['codigo_campania'])) {
		echo $insCampania->actualizar_estado_campania_controlador();
	}
 }

 ?>