<?php 
  /**
   * 
   */
  require_once './models/vistasModelo.php';
  class vistasControlador extends vistasModelo  
  {
  	
  	public function obtener_Plantilla_controlador()
  	{
  		return require_once './views/plantilla.php';
  	}

  	public function obtener_vistas_controlador()
  	{
  		if (isset($_GET['views'])) {
  			$ruta= explode("/", $_GET['views']);
  			$respuesta= vistasModelo::obtener_vistas_modelo($ruta[0]);
  		}else{
  			$respuesta= "login";
  		}
  		return $respuesta;
  	}
  }


 ?>