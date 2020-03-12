<?php 

 /**
  * 
  */
 class vistasModelo
 {
 	
 	protected function obtener_vistas_modelo($vistas)
 	{
 		$listaBlanca= ['home','admin','admin-colportor','editar-usuario','perfil','clientes','usuario','user','empresa','campania','gestionar-campania','usuario','crear-usuario','colportor','libros','facturas','nueva-factura','editar-factura'];

 		if (in_array($vistas, $listaBlanca)) {
 			if (is_file("./views/contenidos/".$vistas."-view.php")) {
 				$contenido= "./views/contenidos/".$vistas."-view.php";
 			}else{
 				$contenido= "login";
 			}
 		}elseif ($vistas=="login") {
 			$contenido= "login";
 		}elseif ($vistas=="index") {
 			$contenido= "login";
 		}else{
 			$contenido= "404";
 		}
 		return $contenido;
 	}
 }

 ?>