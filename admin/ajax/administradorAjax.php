<?php 

$peticionAjax= true;
require_once '../core/configGeneral.php';
if (isset($_POST['dni-reg']) || isset($_POST['codigo-delete']) || isset($_POST['codigo']) || isset($_POST['codigo-up'])) {
	require_once './../controllers/ControladorAdministrador.php';
	$insAdmin = new ControladorAdministrador();
	//AGREGAR administrador
	if (isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg'])) {
		
		echo $insAdmin->agregar_administrador_controlador();
	}
    //eliminar el administrador
	if (isset($_POST['codigo-delete']) && isset($_POST['privilegio-admin'])) {
		echo $insAdmin->eliminar_administrador_controlador();
	}
    //capturar satos del administrador para actualiar
	if (isset($_POST['codigo'])) {
	
		$codigo=$_POST['codigo'];
		$filesA = $insAdmin->datos_administrador_controlador("Unico", $codigo);
		$campos = $filesA->fetch();

		echo json_encode($campos);
	}
    //ACTUALIZAR ADMINISTRADOR
    if (isset($_POST['codigo-up']) || isset($_POST['dni-up']) || isset($_POST['nombre-up']) || isset($_POST['telefono-up'])) {
    	echo $insAdmin->actualizar_administrador_controlador(); 
    }

}else{
	session_start();
	session_destroy();
	echo '<script> window.location.href="'.SERVERURL.'admin/login/"</script>';
}

 ?>