<?php 


if ($peticionAjax) {
    require_once '../models/ModeloUsuario.php';
 }else{
    require_once './models/ModeloUsuario.php';
 }

 /**
  * 
  */
class ControladorUsuario extends ModeloUsuario
{
    public function agregar_controlador_usuario()
    {
        $codigo_colportor= mainModel::limpiar_cadena($_POST['codigo_colportor-reg']);
        $usuario= mainModel::limpiar_cadena($_POST['usuario-reg']);
        $contrasena= mainModel::limpiar_cadena($_POST['contrasena-reg']);
        $rol= mainModel::limpiar_cadena($_POST['rol-reg']);
        
        $privilegio= mainModel::limpiar_cadena($_POST['optionsPrivilegio']);
        $privilegio= mainModel::decryption($privilegio);

        $consulta= mainModel::ejecutar_consulta_simple("SELECT CuentaCodigo FROM colportor WHERE ColportorCodigo='$codigo_colportor'");
        $row =$consulta->fetch();
        $consulta1= mainModel::ejecutar_consulta_simple("SELECT CuentaUsuario FROM cuenta WHERE CuentaUsuario='$usuario'");
        if ($codigo_colportor=="") {
            $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"Debes seleccionar al usuario(colportor)!",
            "Tipo"=>"error"];

        }elseif ($row['CuentaCodigo']!="") {
             $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"El Usuario que ingresaste ya fue tomado!",
            "Tipo"=>"error"];
        }elseif ($consulta1->rowCount()>=1) {
            $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"El Usuario que ingresaste ya se ecuentra registrado!",
            "Tipo"=>"error"];
        }else{
            $consulta2= mainModel::ejecutar_consulta_simple("SELECT id FROM cuenta");
            $numero=($consulta2->rowCount())+1;
            $codigo= mainModel::generar_codigo_aleatorio("SEHS",7,$numero);
            $consulta3= mainModel::ejecutar_consulta_simple("SELECT ColportorGenero FROM colportor WHERE ColportorCodigo='$codigo_colportor'");
            $row = $consulta3->fetch();

            if ($row['ColportorGenero']=="Masculino") {
                $foto="AdminMaleAvatar.png";

            }else{
                $foto="AdminFemaleAvatar.png";
            }
            $clave= mainModel:: encryption($contrasena);
            $dataUser=[
                "Codigo"=>$codigo,
                "Privilegio"=>$privilegio,
                "Usuario"=>$usuario,
                "Clave"=>$clave,
                "Estado"=>"Activo",
                "Tipo"=>$rol,
                "Foto"=>$foto
            ];
           $guardarUser= mainModel::agregar_cuenta($dataUser);
           if ($guardarUser->rowCount()>=1){

                $dataColportor=[
                    "CodigoColportor"=>$codigo_colportor,
                    "CodigoCuenta"=>$codigo
                ];

                $guardarColportor = ModeloUsuario::agregar_modelo_usuario($dataColportor);
                if ($guardarColportor) {
                     $alerta= [
                "Alerta"=>"recargar",
                "Titulo"=>"Usuario Registrado",
                "Texto"=>"Usuario se registro exitosamente!",
                "Tipo"=>"success"];
                
                 } else{
                   
                   $alerta= [
                "Alerta"=>"simple",
                "Titulo"=>"Ocurrio un error inesperado",
                "Texto"=>"No se pudo registrar el Usuario",
                "Tipo"=>"error"];

                 }
                

            }else{
                $alerta= [
                "Alerta"=>"simple",
                "Titulo"=>"Ocurrio un error inesperado",
                "Texto"=>"No se pudo registrar el Usuario",
                "Tipo"=>"error"];
            }

            
        }

        return mainModel::sweet_alert($alerta);
    }

    public function tabla_controlador_usuario($privilegio, $tipo)
    {
        $privilegio = mainModel::limpiar_cadena($privilegio);
        $tipo = mainModel::limpiar_cadena($tipo);
        $tabla = "";

        $conexion = mainModel::conectar();

        $datos = $conexion->query(
            "SELECT * FROM colportor c INNER JOIN cuenta ct ON c.CuentaCodigo = ct.CuentaCodigo ORDER BY ColportorNombre ASC");

        $registros = $datos->fetchAll();

        $tabla.='<div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped jambo_table bulk_action" style="width:100%">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="th-sm">Código</th>
                            <th class="th-sm">Lider</th>
                            <th class="th-sm">Rol</th>
                            <th class="th-sm">Usuario</th>
                            <th class="th-sm">Estado</th>';
                            if ($privilegio <=2) {
                                $tabla.='<th style="width: 14%">Acción</th>';
                            }
                               
                        
                            
                         $tabla.='</tr>
                        </thead>
                        <tbody>';
        if ($datos->rowCount()>0) {
            $contador = 1;
            foreach ($registros as $rows) {
                $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td>'.$rows['ColportorCodigo'].'</td>
                    <td>'.$rows['ColportorNombre'].' '.$rows['ColportorApellido'].'</td>';
                    if ($rows['CuentaTipo']==2) {
                        $tabla.='<td><span class="badge badge-info">Lider</span>';
                    }else{
                       $tabla.='<td><span class="badge badge-warning">Admin</span>';  
                    }
                    $tabla.='<td>'.$rows['CuentaUsuario'].'</td>
                    
                    ';
                    
                    if ($rows['ColportorEstado']==1) {
                       $tabla.='<td><span class="badge badge-success">Activo</span></td>';
                    }
                   
                    if ($privilegio<=1) {
                        $tabla.='<td>
                                    <form data-form="delete" action="'.SERVERURL.'admin/ajax/usuarioAjax.php" method="POST" class="FormularioAjax" autocomplete="off">
                                        <input type="text" hidden="" name="codigo-delete" value="'.mainModel::encryption($rows['ColportorCodigo']).'">
                                        <input type="text" hidden="" name="codigo-delete" value="'.mainModel::encryption($rows['CuentaCodigo']).'">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <a href="'.SERVERURL.'admin/editar-usuario/'.mainModel::encryption($rows['ColportorCodigo']).'" class="btn btn-primary btn-sm"> <i class="fa fa-edit">
                                </i></i> </a>
                        </td>';
                    }
 
                       
                $tabla.='</tr>';
                $contador++;
            }
        }else{
            $tabla.='
            <tr>
                <td colspan="8"> No hay registros en el sistema </td>
            </tr>
            ';
        }

        $tabla.='     </tbody>
                    </table>
                 </div>';
        return $tabla;
    }
    
    public function datos_controlador_usuario($tipo, $codigo)
    {
        $codigo = mainModel::decryption($codigo);
        $tipo   = mainModel::limpiar_cadena($tipo);

        return ModeloUsuario::datos_modelo_usuario($tipo, $codigo);
    }

    public function actualizar_controlador_libro()
    {
        $codigo = mainModel::limpiar_cadena($_POST['codigo_libro-up']);
        $nombre_libro = mainModel::limpiar_cadena($_POST['nombre_libro-up']);
        $nombre_libro = strtoupper($nombre_libro);
        $estado = mainModel::limpiar_cadena($_POST['estado-up']);
        $precio = mainModel::limpiar_cadena($_POST['precio-up']);
        $estado=intval($estado);
        $precio=floatval($precio);
        $date_added=date("Y-m-d H:i:s");

        $dataUP= [
            "codigoLibro"=>$codigo,
            "NombreLibro"=>$nombre_libro,
            "Estado"=>$estado,
            "PrecioLibro"=>$precio,
            "dateAdd"=>$date_added
          ];
        $up = ModeloLibro::actualizar_modelo_libro($dataUP);
        if ($up) {
            $alerta= [
            "Alerta"=>"recargar",
            "Titulo"=>"Datos actualizados",
            "Texto"=>"Los datos han sido actualizados con exito",
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
    public function actualizar_controlador_usuario_user()
     {
         $codigo = mainModel::decryption($_POST['codigo_cuenta_up']);
         $usuario = mainModel::limpiar_cadena($_POST['usuario-up']);

         if ($usuario =="") {
             $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"Campo usuario vació",
            "Tipo"=>"error"];
         }
         else{
            $consulta1 = mainModel::ejecutar_consulta_simple("SELECT CuentaUsuario FROM cuenta WHERE CuentaUsuario='$usuario'");
            if ($consulta1->rowCount()>=1) {
               $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"El usuario que ingresaste ya se registrado!",
            "Tipo"=>"error"]; 
            }else{
               $dataU = [
                "CodigoCuenta"=>$codigo,
                "Usuario"=>$usuario
               ];

               if (ModeloUsuario::actualizar_modelo_usuario_user($dataU)) {
                    $alerta= [
                    "Alerta"=>"simple",
                    "Titulo"=>"Usuario Actualizado",
                    "Texto"=>"Actualizado Exitosamente!",
                    "Tipo"=>"success"];
               }else{
                $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"No se pudo actualizar",
            "Tipo"=>"error"]; 
               }
            }
         }
         return mainModel::sweet_alert($alerta);
     } 
    public function actualizar_controlador_usuario_pass()
    {
        $codigo = mainModel::decryption($_POST['codigo_cuenta_pass']);
        $passA = mainModel::encryption($_POST['passwordA']);
        $passN = mainModel::limpiar_cadena($_POST['passwordN']);
        $passC = mainModel::limpiar_cadena($_POST['passwordC']);

        $consulta1 = mainModel::ejecutar_consulta_simple("SELECT * FROM cuenta WHERE CuentaCodigo='$codigo'");
        $row = $consulta1->fetch();
        if ($row['CuentaClave']==$passA) {
            if ($passN==$passC) {
                $passN = mainModel::encryption($passN);
                $upPass = mainModel::ejecutar_consulta_simple("UPDATE cuenta SET CuentaClave = '$passN' WHERE CuentaCodigo='$codigo'");
                if ($upPass) {
                   $alerta= [
                    "Alerta"=>"recargar",
                    "Titulo"=>"Contraseña Actualizado",
                    "Texto"=>"Actualizado Exitosamente!",
                    "Tipo"=>"success"]; 
                }else{
                    $alerta= [
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No se pudo actualizar la contraseña",
                    "Tipo"=>"error"];
                }
            }else{
                $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"La contraseña no coincide con la confirmación",
            "Tipo"=>"error"];
             
            }
        }else{
         $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"Contraseña actual es incorrecta",
            "Tipo"=>"error"];
        }

        return mainModel::sweet_alert($alerta);
    }
    public function eliminar_controlador_libro()
    {
        $codigo = mainModel::decryption($_POST['codigo-delete']);

        $DelLibro = ModeloLibro::eliminar_modelo_libro($codigo);
        if ($DelLibro) {
            $alerta= [
            "Alerta"=>"recargar",
            "Titulo"=>"Libro eliminado",
            "Texto"=>"El libro fue eliminado con exito del sistema",
            "Tipo"=>"success"];
        }else{
            $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"No podemos eliminar esta cuenta en este momento",
            "Tipo"=>"error"];
        }

          return mainModel::sweet_alert($alerta);
    }
    public function actualizar_estado_campania_controlador()
    {
        $codigo = mainModel::limpiar_cadena($_POST['codigo_campania']);
        $estado = mainModel::limpiar_cadena($_POST['estado']);

        $enviarDatos = [
            "Codigo"=>$codigo,
            "Estado"=>$estado

        ];

        ModeloCampania::actualizar_estado_campania_modelo($enviarDatos);
        
    }
}

?>