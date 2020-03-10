<?php 


if ($peticionAjax) {
 	require_once '../models/ModeloAdministrador.php';
 }else{
 	require_once './models/ModeloAdministrador.php';
 }

 /**
  * 
  */
 class ControladorAdministrador extends ModeloAdministrador
 {
 	public function agregar_administrador_controlador()
	{
		$dni= mainModel::limpiar_cadena($_POST['dni-reg']);
		$nombre= mainModel::limpiar_cadena($_POST['nombre-reg']);
		$apellido= mainModel::limpiar_cadena($_POST['apellido-reg']);
		$telefono= mainModel::limpiar_cadena($_POST['telefono-reg']);
		$direccion= mainModel::limpiar_cadena($_POST['direccion-reg']);
		$mision= intval(mainModel::limpiar_cadena($_POST['mision-reg'])); 

		$usuario= mainModel::limpiar_cadena($_POST['usuario-reg']);
		$password1= mainModel::limpiar_cadena($_POST['password1-reg']);
		$password2= mainModel::limpiar_cadena($_POST['password2-reg']);
		$email= mainModel::limpiar_cadena($_POST['email-reg']);
		$genero= mainModel::limpiar_cadena($_POST['optionsGenero']);
		$privilegio = mainModel:: decryption($_POST['optionsPrivilegio']);
		$privilegio= mainModel::limpiar_cadena($privilegio);

		if ($genero=="Masculino") {
			$foto="AdminMaleAvatar.png";

		}else{
			$foto="AdminFemaleAvatar.png";
		}
        if ($privilegio<1 || $privilegio>3) {
        	$alerta= [
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"El nivel de privilegio que intenta asignar es incorrecto",
				"Tipo"=>"error"];
        }else{
           if ($password1!=$password2){
           	   $alerta= [
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrio un error inesperado",
				"Texto"=>"Las contraseñas que acabas de ingresar no coinciden, por favor intente nuevamente!",
				"Tipo"=>"error"];
            }else{
            	$consulta1= mainModel::ejecutar_consulta_simple("SELECT AdminDNI FROM admin WHERE AdminDNI='$dni'");
            	if ($consulta1->rowCount()>=1) {
            		$alerta= [
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"El DNI ya existe!",
					"Tipo"=>"error"];
				}else{
					if ($email!="") {
						$consulta2= mainModel::ejecutar_consulta_simple("SELECT CuentaEmail FROM cuenta WHERE CuentaEmail='$email'");
						$ec= $consulta2->rowCount();
					}else{
						$ec=0;
					}
					if ($ec >=1) {
						$alerta= [
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El EMAIL que ingresaste ya se ecuentra registrado!",
						"Tipo"=>"error"];
					}else{
						$consulta3= mainModel::ejecutar_consulta_simple("SELECT CuentaUsuario FROM cuenta WHERE CuentaUsuario='$usuario'");
						if ($consulta3->rowCount()>=1) {
							$alerta= [
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"El Usuario que ingresaste ya se ecuentra registrado!",
							"Tipo"=>"error"];
						}else{
							$consulta4= mainModel::ejecutar_consulta_simple("SELECT id FROM cuenta");
							$numero=($consulta4->rowCount())+1;
						    $codigo= mainModel::generar_codigo_aleatorio("SEHS",7,$numero);
						    $clave= mainModel:: encryption($password1);
							$dataAC=[
								"Codigo"=>$codigo,
								"Privilegio"=>$privilegio,
								"Usuario"=>$usuario,
								"Clave"=>$clave,
								"Estado"=>"Activo",
								"Tipo"=>1,
								"Foto"=>$foto
							];
							$guardarCuenta= mainModel::agregar_cuenta($dataAC);

							if($guardarCuenta->rowCount()>=1) {
					            $dataAD= [
					                "DNI"=>$dni,
					                "Nombre"=>$nombre,
					                "Apellido"=>$apellido,
					                "Genero"=>$genero,
					                "Email"=>$email,
					                "Telefono"=>$telefono,
					                "Direccion"=>$direccion,
					                "Mision"=>$mision,
					                "Codigo"=>$codigo
					              ];

				                $guardarAdmin = ModeloAdministrador::agregar_administrador_modelo($dataAD);

				                if ($guardarAdmin->rowCount()>=1){
					                $alerta= [
							        "Alerta"=>"recargar",
							        "Titulo"=>"Administrador Registrado",
							        "Texto"=>"El Administrador se registro exitosamente!",
							        "Tipo"=>"success"];

			                    }else{
			                    	$alerta= [
							        "Alerta"=>"simple",
							        "Titulo"=>"Ocurrio un error inesperado",
							        "Texto"=>"No se pudo registrar el Administrador",
							        "Tipo"=>"error"];
							    }
							}else{
								$alerta= [
						        "Alerta"=>"simple",
						        "Titulo"=>"Ocurrio un error inesperado",
						        "Texto"=>"No se pudo registrar el Administrador",
						        "Tipo"=>"error"];
						    }
						}
					}
				}
			}
			return mainModel::sweet_alert($alerta);
		}
        
	}
 	public function paginador_administrador_controlador($pagina, $registros, $privilegio, $codigo)
	{
		$pagina = mainModel::limpiar_cadena($pagina);
		$registros = mainModel::limpiar_cadena($registros);
		$privilegio = mainModel::limpiar_cadena($privilegio);
		$codigo = mainModel::limpiar_cadena($codigo);
		$tabla = "";

		$pagina = (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
        $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;

        $conexion = mainModel::conectar();

        $datos = $conexion->query(
        	"SELECT SQL_CALC_FOUND_ROWS * FROM admin WHERE CuentaCodigo!='$codigo' AND id!='1' ORDER BY AdminNombre ASC LIMIT $inicio, $registros"
        );

        $datos = $datos->fetchAll();

        $total = $conexion->query("SELECT FOUND_ROWS()");
        $total = (int) $total->fetchColumn();

        $Npaginas = ceil($total/$registros);


        $tabla.='<div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped jambo_table bulk_action" style="width:100%">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th>Dni</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Telefono</th>';
                    if ($privilegio<=2) {
                    	$tabla.='<th class="text-center">A. Cuenta</th>
                            <th class="text-center">A. Datos</th>';
                    }
                    if ($privilegio==1) {
                    	$tabla.='<th class="text-center">Eliminar</th>';
                    }
                                 
                $tabla.='</tr>
                        </thead>
                        <tbody>';
        if ($total>=1 && $pagina<=$Npaginas) {
        	$contador = $inicio+1;
        	foreach ($datos as $rows) {
        		$tabla.='
        		<tr>
					<td>'.$contador.'</td>
					<td>'.$rows['AdminDNI'].'</td>
					<td>'.$rows['AdminNombre'].'</td>
					<td>'.$rows['AdminApellido'].'</td>
					<td>'.$rows['AdminTelefono'].'</td>';
					
					if ($privilegio<=2) {
						$tabla.='<td>
                            <button class="btn btn-success btn-sm bnEditarCuenta" data-codigo="'.$rows['CuentaCodigo'].'" type="button"><i class="fa fa-refresh" ></i> </button>
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm btnEditarDatos" data-codigo="'.$rows['CuentaCodigo'].'"    type="button"><i class="fa fa-refresh" ></i> </button>
                        </td>';
					}
					if($privilegio==1){
                        $tabla.='<td>
			                        <form data-form="delete" action="'.SERVERURL.'admin/ajax/administradorAjax.php" method="POST" class="FormularioAjax" autocomplete="off">
			                            <input type="text" hidden="" name="codigo-delete" value="'.mainModel::encryption($rows['CuentaCodigo']).'">
			                            <input type="text" hidden="" name="privilegio-admin" value="'.mainModel::encryption($privilegio).'">
			                        	<button type="submit" class="btn btn-danger btn-sm btnEliminar"><i class="fa fa-trash"></i></button>
			                        </form>
                                </td>';
					}
					    
                        
                $tabla.='</tr>';
        		$contador++;
        	}
        }else{
        	$tabla.='
        	<tr>
        	    <td colspan="7"> No hay registros en el sistema </td>
        	</tr>
        	';
        }

        $tabla.='     </tbody>
                    </table>
                 </div>';
		return $tabla;

	}

	public function eliminar_administrador_controlador()
	{
		$codigo = mainModel::decryption($_POST['codigo-delete']);
		$adminPrivilegio= mainModel::decryption($_POST['privilegio-admin']);
		$codigo= mainModel::limpiar_cadena($codigo);
		$adminPrivilegio= mainModel::limpiar_cadena($adminPrivilegio);

		if ($adminPrivilegio == 1) {
			$query1 = mainModel::ejecutar_consulta_simple("SELECT id FROM admin WHERE CuentaCodigo = '$codigo' ");
			$datosAdmin = $query1->fetch();
			if ($datosAdmin['id']!=1) {
				$DelAdmin = ModeloAdministrador::eliminar_administrador_modelo($codigo);

				if ($DelAdmin->rowCount()>=1) {
					$DelCuenta = mainModel::eliminar_cuenta($codigo);
					if ($DelCuenta->rowCount()==1) {
						$alerta= [
				        "Alerta"=>"recargar",
				        "Titulo"=>"Administrador eliminado",
				        "Texto"=>"El Administrador fue eliminado con exito del sistema",
				        "Tipo"=>"success"];
					}else{
						$alerta= [
				        "Alerta"=>"simple",
				        "Titulo"=>"Ocurrio un error inesperado",
				        "Texto"=>"No podemos eliminar esta cuenta en este momento",
				        "Tipo"=>"error"];
					}
				}
			}else{
				$alerta= [
		        "Alerta"=>"simple",
		        "Titulo"=>"Ocurrio un error inesperado",
		        "Texto"=>"No podemos eliminar el Administrador principal",
		        "Tipo"=>"error"];
			}
		}else{
			$alerta= [
	        "Alerta"=>"simple",
	        "Titulo"=>"Ocurrio un error inesperado",
	        "Texto"=>"Tu no tienes los permisos necesarios para realizar esta operación ",
	        "Tipo"=>"error"];
		}

		return mainModel::sweet_alert($alerta);
	}
	public function datos_administrador_controlador($tipo, $codigo)
	{
		$codigo = mainModel::limpiar_cadena($codigo);
		$tipo   = mainModel::limpiar_cadena($tipo);

		return ModeloAdministrador::datos_administrador_modelo($tipo, $codigo);
	}

	public function actualizar_administrador_controlador()
	{
		$codigo= mainModel::limpiar_cadena($_POST['codigo-up']);
		$dni= mainModel::limpiar_cadena($_POST['dni-up']);
		$nombre= mainModel::limpiar_cadena($_POST['nombre-up']);
		$apellido= mainModel::limpiar_cadena($_POST['apellido-up']);
		$telefono= mainModel::limpiar_cadena($_POST['telefono-up']);
		$direccion= mainModel::limpiar_cadena($_POST['direccion-up']);
		$mision= intval(mainModel::limpiar_cadena($_POST['mision-up']));

		$query1 = mainModel::ejecutar_consulta_simple("SELECT * FROM admin WHERE CuentaCodigo = '$codigo'");
		$DatosAdmin = $query1->fetch();

		if ($dni!=$DatosAdmin['AdminDNI']) {
			$consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM admin WHERE AdminDNI = '$dni'");
			if ($consulta1->rowCount()>=1) {
				$alerta= [
		        "Alerta"=>"simple",
		        "Titulo"=>"Ocurrio un error inesperado",
		        "Texto"=>"El DNI que acabas de ingresar se encuentra registrado en el sistema",
		        "Tipo"=>"error"];
		        return mainModel::sweet_alert($alerta);
			exit();
		    }
		    
		}

		 $dataUP= [
            "DNI"=>$dni,
            "Nombre"=>$nombre,
            "Apellido"=>$apellido,
            "Telefono"=>$telefono,
            "Direccion"=>$direccion,
            "Mision"=>$mision,
            "Codigo"=>$codigo
          ];

         if (ModeloAdministrador::actualizar_administrador_modelo($dataUP)) {
         	$alerta= [
	        "Alerta"=>"recargar",
	        "Titulo"=>"Datos actualizados",
	        "Texto"=>"Tus datos han sido actualizados con exito",
	        "Tipo"=>"success"];
         }else{
            $alerta= [
	        "Alerta"=>"simple",
	        "Titulo"=>"Ocurrio un error inesperado",
	        "Texto"=>"No hemos podido actualizar tus datos, intente nuevamente ",
	        "Tipo"=>"error"];
         }

        return mainModel::sweet_alert($alerta);
	}
 }
 ?>