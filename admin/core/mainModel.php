<?php 

 /**
  * 
  */
 if ($peticionAjax) {
 	require_once '../core/configAPP.php';
 }else{
 	require_once './core/configAPP.php';
 }

 class mainModel 
 {
 	
 	protected function conectar()
 	{
 		$enlace = new PDO(SGBD, USER, PASS);

 		return $enlace;
 	}

 	protected function ejecutar_consulta_simple($consulta)
 	{
 		// puede incluir en <<self>> por mainModel
 		$respuesta= self::conectar()->prepare($consulta);
 		$respuesta->execute();
 		return $respuesta;
 	}

 	protected function agregar_cuenta($datos){
 		$sql= self::conectar()->prepare("INSERT INTO cuenta(CuentaCodigo, CuentaPrivilegio, CuentaUsuario, CuentaClave, CuentaEstado, CuentaTipo, CuentaFoto) VALUES(:Codigo,:Privilegio,:Usuario,:Clave,:Estado,:Tipo,:Foto)");

 		$sql->bindParam(":Codigo",$datos['Codigo']);
 		$sql->bindParam(":Privilegio",$datos['Privilegio']);
 		$sql->bindParam(":Usuario",$datos['Usuario']);
 		$sql->bindParam(":Clave",$datos['Clave']);
 		$sql->bindParam(":Estado",$datos['Estado']);
 		$sql->bindParam(":Tipo",$datos['Tipo']);
 		$sql->bindParam(":Foto",$datos['Foto']);
 
 		$sql->execute();

 		return $sql;
 	}

 	protected function eliminar_cuenta($codigo){
 		$sql= self::conectar()->prepare("DELETE FROM `cuenta` WHERE CuentaCodigo=:Codigo");

 		$sql->bindParam(":Codigo", $codigo);
 		$sql->execute();

 		return $sql;
 	}
 	
 	protected function datos_cuenta($codigo){
 		$query = self::conectar()->prepare("SELECT * FROM cuenta WHERE CuentaCodigo=:Codigo");
 		$query->bindParam("Codigo",$codigo);
 		$query->execute();

 		return $query;
 	}
    protected function actualizar_cuenta($datos){
    	$query = self::conectar()->prepare("UPDATE cuenta SET CuentaPrivilegio=:Privilegio, CuentaUsuario=:Usuario,CuentaClave=:Clave,CuentaEmail=:Email,CuentaEstado=:Estado,CuentaGenero=Genero,CuentaFoto=:Foto WHERE CuentaCodigo=:Codigo");
    	$query->bindParam(":Privilegio",$datos['Privilegio']);
    	$query->bindParam(":Usuario",$datos['Usuario']);
    	$query->bindParam(":Clave",$datos['Clave']);
    	$query->bindParam(":Email",$datos['Email']);
    	$query->bindParam(":Estado",$datos['Estado']);
    	$query->bindParam(":Genero",$datos['Genero']);
    	$query->bindParam(":Foto",$datos['Foto']);
    	$query->bindParam(":Codigo",$datos['Codigo']);
    	$query->execute();

    	return $query;
 	}

 	protected function eliminar_bitacora($codigo){

 	}

 	public static function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}
	public static function decryption($string){
		$key=hash('sha256', SECRET_KEY);
		$iv=substr(hash('sha256', SECRET_IV), 0, 16);
		$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
		return $output;
	}

	protected function generar_codigo_aleatorio($letra, $longitud,$num){
		for ($i=1; $i < $longitud; $i++) { 
			$numero= rand(0,9);
			$letra.=$numero;
		}
		return $letra.$num;

	}
	protected function limpiar_cadena($cadena){
		$cadena= trim($cadena);
		$cadena= stripslashes($cadena);
		$cadena= str_ireplace("<script>", "", $cadena);
		$cadena= str_ireplace("</script>", "", $cadena);
		$cadena= str_ireplace("<script src>", "", $cadena);
		$cadena= str_ireplace("<script type=>", "", $cadena);
		$cadena= str_ireplace("SELECT * FROM", "", $cadena);
		$cadena= str_ireplace("DELETE FROM", "", $cadena);
		$cadena= str_ireplace("INSERT INTO", "", $cadena);
		$cadena= str_ireplace("--", "", $cadena);
		$cadena= str_ireplace("^", "", $cadena);
		$cadena= str_ireplace("[", "", $cadena);
		$cadena= str_ireplace("]", "", $cadena);
		$cadena= str_ireplace("==", "", $cadena);
		return $cadena;

	}
	protected function sweet_alert($dato){
		
		if ($dato['Alerta']=="simple") {
			$alerta="
			<script>
				swal(
				'".$dato['Titulo']."', 
				'".$dato['Texto']."', 
				'".$dato['Tipo']."'
				);

			</script>
			";
		}elseif ($dato['Alerta']=="recargar") {
			$alerta="
			<script>
			Swal.fire({
				  title: '".$dato['Titulo']."',
				  text: '".$dato['Texto']."',
				  type: '".$dato['Tipo']."',

				  confirmButtonText: 'Aceptar'
				}).then(function() {
				
				  	location.reload();
				    
				
				});
			</script>";
		}elseif ($dato['Alerta']=="limpiar") {
			$alerta= "
			<script>
			Swal.fire({
				  title: '".$dato['Titulo']."',
				  text: '".$dato['Texto']."',
				  type: '".$dato['Tipo']."',

				  confirmButtonText: 'Aceptar'
				}).then(function () {
				 
				  	$('.FormularioAjax')[0].reset();
				    
			
				});
			</script>";
		}
		return $alerta;
	}
 }


 ?>