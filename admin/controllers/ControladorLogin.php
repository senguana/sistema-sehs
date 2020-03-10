<?php 

 if ($peticionAjax) {
 	require_once '../models/ModeloLogin.php';
 }else{
 	require_once './models/ModeloLogin.php';
 }
/**
 * 
 */
class ControladorLogin extends ModeloLogin
{
	
	public function iniciar_sesion_controlador()
	{
		$usuario = mainModel::limpiar_cadena($_POST['usuario']);
		$clave   = mainModel::limpiar_cadena($_POST['clave']);
		$rol   = mainModel::limpiar_cadena($_POST['rol']);

		$clave = mainModel::encryption($clave);
        

		$datosLogin = [
			'Usuario' => $usuario,
			'Clave'   => $clave,
			'Rol'   => $rol
		];

		$datosCuenta = ModeloLogin::iniciar_sesion_modelo($datosLogin);

		if ($datosCuenta->rowCount()==1) {
			$row = $datosCuenta->fetch();
            $fechaActual = date("Y-m-d");
			$yearActual  = date("Y");
			$horaActual  = date("h:i:s a");

			session_start(['name'=>'SEHS']);
            if ($row['CuentaTipo']==1) {
            	$_SESSION['AdminNombre'] = $row['AdminNombre'];
                $_SESSION['AdminApellido'] = $row['AdminApellido'];
            }else{
            	$_SESSION['AdminNombre'] = $row['ColportorNombre'];
                $_SESSION['AdminApellido'] = $row['ColportorApellido'];
            }
			
            $_SESSION['CuentaCodigo'] = $row['id'];          
            $_SESSION['usuario_sehs'] = $row['CuentaUsuario'];
            $_SESSION['privilegio_sehs'] = $row['CuentaPrivilegio'];
            $_SESSION['foto_sehs'] = $row['CuentaFoto'];
            $_SESSION['token_sehs'] = md5(uniqid(mt_rand(), true));
            $_SESSION['codigo_cuenta_sehs'] = $row['CuentaCodigo'];
            $_SESSION['cuenta_tipo_sehs'] = $row['CuentaTipo'];

            if ($row['CuentaTipo'] == 1) {
            	$url = SERVERURL."admin/home/";
            }else{
            	$url = SERVERURL."admin/user/";
            }

            return $urlLocation = '<script> window.location="'.$url.'"</script>';
			//consulta1 = mainModel::ejecutar_consulta_simple();
		}else{
			$alerta= [
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"El nombre de usuario y contraseña no son correctos o su cuenta puede estar deshabilitada",
				"Tipo"=>"error"
			];
            return mainModel::sweet_alert($alerta);

		}
	}
    public function cerrar_sesion_controlador()
	{
		session_start(['name'=>'SEHS']); 
		$token = mainModel::decryption($_GET['Token']);
		$hora = date("h:i:s a");
		$datos = [
			"Usuario"=>$_SESSION['usuario_sehs'],
			"Token_S"=> $_SESSION['token_sehs'],
			"Token"=> $token,
			"Hora"=> $hora
		];

		return ModeloLogin::cerrar_sesion_modelo($datos);
	}
	public function forzar_cerrar_sesion_controlador()
	{ 
		session_unset();
		session_destroy();
		$redirect ='<script>window.location.href="'.SERVERURL.'admin/login/"</script>'; 
		return $redirect;
	}

	public function redireccionar_controlador_usuario($tipo)
	{
		if ($tipo == "Administrador") {
			$redirect ='<script>window.location.href="'.SERVERURL.'admin/home/"</script>'; 
		}else{
			$redirect ='<script>window.location.href="'.SERVERURL.'admin/user/"</script>'; 
		}

		return $redirect;
	}
}

 ?>