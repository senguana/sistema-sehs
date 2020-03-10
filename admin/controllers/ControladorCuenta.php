<?php 

 if ($peticionAjax) {
 	require_once '../core/mainModel.php';
 }else{
 	require_once './core/mainModel.php';
 }
 
/**
 * 
 */
class ControladorCuenta extends mainModel
{
	
	public function datos_controlador_cuenta($codigo)
	{
		$codigo = mainModel::limpiar_cadena($codigo);

		return mainModel::datos_cuenta($codigo);
	}

	public function actualizar_controlador_cuenta()
	{
		$Cuentacodigo = mainModel::limpiar_cadena($_POST['codigoCuenta-up']);
		$CuentaTipo   = mainModel::decryption($_POST['tipoCuenta-up']);
		$query1 = mainModel::ejecutar_consulta_simple("SELECT * FROM cuenta WHERE Cuentacodigo='$Cuentacodigo'"); 
		$DatosCuenta = $query1->fetch();

		$user = mainModel::limpiar_cadena($_POST['usuarioLogin']);
		$password = mainModel::limpiar_cadena($_POST['passwordLogin']);
		$password = mainModel::encryption($password);
		
        
        if ($user!="" && $password!="") {
        	$login = mainModel::ejecutar_consulta_simple("SELECT id FROM cuenta WHERE CuentaUsuario='$user' AND CuentaClave = '$password'");
        	if ($login->rowCount()==0) {
        		$alerta= [
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"El nombre de usuario y el clave que acabas de ingresar no coinciden con los datos de su cuenta, por favor ingresa los datos e intente nuevamente",
				"Tipo"=>"error"];
				return mainModel::sweet_alert($alerta);
				exit();
        	}else{

        	}
        }else{
        	$alerta= [
			"Alerta"=>"simple",
			"Titulo"=>"Ocurrio un error inesperado",
			"Texto"=>"Para actualizar los datos de la cuenta debe de ingresar el nombre de usuario y el clave, por favor ingresa los datos e intente nuevamente",
			"Tipo"=>"error"];
			return mainModel::sweet_alert($alerta);
			exit();
        }
		$CuentaUsuario = mainModel::limpiar_cadena($_POST['usuario-up']);
		if ($CuentaUsuario!=$DatosCuenta['CuentaUsuario']) {
			$query2 = mainModel::ejecutar_consulta_simple("SELECT CuentaUsuario FROM cuenta WHERE CuentaUsuario='$CuentaUsuario'");
			if ($query2->rowCount()>=1) {
				$alerta= [
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"El nombre de usuario que acaba de ingresar ya se encuentra registrado ",
				"Tipo"=>"error"];
				return mainModel::sweet_alert($alerta);
				exit();
			}
		}
       $CuentaEmail = mainModel::limpiar_cadena($_POST['email-up']);
		if ($CuentaUsuario!=$DatosCuenta['CuentaEmail']) {
			$query3 = mainModel::ejecutar_consulta_simple("SELECT CuentaUsuario FROM cuenta WHERE CuentaEmail='$CuentaEmail'");
			if ($query3->rowCount()>=1) {
				$alerta= [
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"El correo que acaba de ingresar ya se encuentra registrado! ",
				"Tipo"=>"error"];
				return mainModel::sweet_alert($alerta);
				exit();
			}
		}

		$CuentaGenero = mainModel::limpiar_cadena($_POST['optionsGenero-up']);
        if (isset($_POST['optionsEstado-up'])) {
        	$CuentaEstado = mainModel::decryption($_POST['optionsEstado-up']);
        }else{
        	$CuentaEstado = $DatosCuenta['CuentaEstado'];
        }
		if ($CuentaTipo == "Administrador") {
			if (isset($_POST['optionsPrivilegio'])) {
				$CuentaPrivilegio = mainModel::decryption($_POST['optionsPrivilegio']);
			}else{
                $CuentaPrivilegio = $DatosCuenta['CuentaPrivilegio'];
			}

			if ($genero=="Masculino") {
			$foto="TeacherMaleAvatar.png";

			}else{
				$foto="TeacherFemaleAvatar.png";
			}
		}else{
			$CuentaPrivilegio = $DatosCuenta['CuentaPrivilegio'];
			 if ($genero=="Masculino") {
				$foto="StudetMaleAvatar.png";
			}else{
				$foto="StudetFemaleAvatar.png";
			}
		}

		// VERIFICAR fbsql_password(link_identifier)
		$password1 =  mainModel::limpiar_cadena($_POST['newpassword1-reg']);
		$password2 =  mainModel::limpiar_cadena($_POST['newpassword2-reg']);

		if ($password1!="" || $password2!="" ) {
			if ($password1 == $password2) {
				$CuentaClave = mainModel::encryption($password1);
			}else{
				$alerta= [
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"Las nuevas contraseñas no coinciden, por favor ingresa los datos e intente nuevamente",
				"Tipo"=>"error"];
				return mainModel::sweet_alert($alerta);
				exit();
			}
		}else{
			$CuentaClave = $DatosCuenta['CuentaClave'];
		}

		$datosUp = [
			"Privilegio"=>$CuentaPrivilegio,
			"Usuario"=>$CuentaUsuario,
			"Clave"=>$CuentaClave,
			"Email"=> $CuentaEmail,
			"Estado"=>$CuentaEstado,
			"Genero"=>$CuentaGenero,
			"Foto"=>$foto,
			"Codigo"=>$Cuentacodigo

		];

		if (mainModel::actualizar_cuenta($datosUp)) {
			if (!isset($_POST['optionsPrivilegio'])) {
				session_start(['name'=>'SEHS']); 
				$_SESSION['usuario_sehs'] = $CuentaUsuario;
				$_SESSION['foto_sehs'] = $foto;
			}
			$alerta= [
				"Alerta"=>"recargar",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"Los datos de la cuenta se actualizaron con exito",
				"Tipo"=>"success"];
				
		}else{
            $alerta= [
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"Lo sentimos no hemos podido actualizar los datos de la cuenta",
				"Tipo"=>"error"];
			
		}
			return mainModel::sweet_alert($alerta);
	}

	
}

 ?>