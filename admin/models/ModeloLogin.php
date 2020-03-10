<?php 

 if ($peticionAjax) {
 	require_once '../core/mainModel.php';
 }else{
 	require_once './core/mainModel.php';
 }

/**
 * 
 */
class ModeloLogin extends mainModel
{
	
	protected function iniciar_sesion_modelo($datos)
	{
		if ($datos['Rol']==1) {
			$sql = mainModel::conectar()->prepare("SELECT * FROM admin a INNER JOIN cuenta c ON a.CuentaCodigo = c.CuentaCodigo WHERE CuentaUsuario=:Usuario AND CuentaClave=:Clave  AND CuentaTipo =:Rol AND CuentaEstado='Activo'");
		}elseif($datos['Rol']==2){
			$sql = mainModel::conectar()->prepare("SELECT * FROM colportor c INNER JOIN cuenta ct ON c.CuentaCodigo = ct.CuentaCodigo WHERE CuentaUsuario=:Usuario AND CuentaClave=:Clave  AND CuentaTipo =:Rol AND CuentaEstado='Activo'");
		}
		
		$sql->bindParam(':Usuario', $datos['Usuario']);
		$sql->bindParam(':Clave', $datos['Clave']);
		$sql->bindParam(':Rol', $datos['Rol']);
		$sql->execute();

		return $sql;
	}

	protected function cerrar_sesion_modelo($datos)
	{
		if ($datos['Usuario'] != "" && $datos['Token_S'] == $datos['Token']) {
			session_start(['name'=>'SEHS']); 

			session_unset();
			session_destroy();
           $respuesta = true;

		}else{
           $respuesta = false;
		}

		return $respuesta;
	}
}

 ?>