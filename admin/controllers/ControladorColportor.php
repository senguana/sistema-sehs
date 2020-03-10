<?php 


if ($peticionAjax) {
    require_once '../models/ModeloColportor.php';
 }else{
    require_once './models/ModeloColportor.php';
 }

 /**
  * 
  */
class ControladorColportor extends ModeloColportor
{
    public function agregar_controlador_colportor()
    {
        $dni= mainModel::limpiar_cadena($_POST['dni-reg']);
        $nombres= mainModel::limpiar_cadena($_POST['nombres-reg']);
        $apellidos= mainModel::limpiar_cadena($_POST['apellidos-reg']);
        $genero= mainModel::limpiar_cadena($_POST['genero-reg']);
        $direccion= mainModel::limpiar_cadena($_POST['direccion-reg']);
        $celular= mainModel::limpiar_cadena($_POST['cell-reg']);
        $email= mainModel::limpiar_cadena($_POST['email-reg']);
        $pais= mainModel::limpiar_cadena($_POST['pais-reg']);
        $provincia = mainModel::limpiar_cadena($_POST['provincia-reg']);
        $ciudad= mainModel::limpiar_cadena($_POST['ciudad-reg']);
        $mision= mainModel::limpiar_cadena($_POST['mision-reg']);
        $fecha_add = date("Y-m-d H:i:s");

        $consulta1= mainModel::ejecutar_consulta_simple("SELECT DNI FROM colportor WHERE DNI='$dni'");
        if ($consulta1->rowCount()>=1) {
            $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"El DNI que ingresaste ya se ecuentra registrado!",
            "Tipo"=>"error"];
        }else{
            $consulta2= mainModel::ejecutar_consulta_simple("SELECT ColportorEmail FROM colportor WHERE ColportorEmail='$email'");
            if ($consulta1->rowCount()>=1) {
                $alerta= [
                "Alerta"=>"limpiar",
                "Titulo"=>"Ocurrio un error inesperado",
                "Texto"=>"El EMAIL que ingresaste ya se ecuentra registrado!",
                "Tipo"=>"error"];
            }else{
                $consulta2= mainModel::ejecutar_consulta_simple("SELECT id FROM colportor");
                $numero=($consulta2->rowCount())+1;
                $codigo= mainModel::generar_codigo_aleatorio("COLP-",7,$numero);

                $dataColportor=[
                    "Codigo"=>$codigo,
                    "DNI"=>$dni,
                    "Nombres"=>$nombres,
                    "Apellidos"=>$apellidos,
                    "Genero"=>$genero,
                    "Direccion"=>$direccion,
                    "Celular"=>$celular,
                    "Email"=>$email,
                    "Pais"=>$pais,
                    "Provincia"=>$provincia,
                    "Ciudad"=>$ciudad,
                    "Mision"=>$mision,
                    "FechaAdd"=>$fecha_add
                ];
                $guardarColportor = ModeloColportor::agregar_modelo_colportor($dataColportor);
                if ($guardarColportor){
                    $alerta= [
                    "Alerta"=>"recargar",
                    "Titulo"=>"Campania Registrado",
                    "Texto"=>"Tus Datos se ha registrado exitosamente!",
                    "Tipo"=>"success"];

                }else{
                    $alerta= [
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No se pudo registrar tus datos",
                    "Tipo"=>"error"];
                }
            }
            
        }

        return mainModel::sweet_alert($alerta);
    }

    public function tabla_controlador_colportor($privilegio, $tipo)
    {
        $privilegio = mainModel::limpiar_cadena($privilegio);
        $tipo = mainModel::limpiar_cadena($tipo);
        $tabla = "";

        $conexion = mainModel::conectar();

        $datos = $conexion->query(
            "SELECT * FROM colportor c INNER JOIN pais p ON c.ColportorPaisId = p.id_pais INNER JOIN provincia pv ON c.ColportorProvinciaId = pv.id_provincia INNER JOIN ciudad cd ON c.ColportorCiudadId = cd.id_ciudad");

        $registros = $datos->fetchAll();

        $tabla.='<div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped jambo_table bulk_action" style="width:100%">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="th-sm">Código</th>
                            <th class="th-sm">DNI</th>
                            <th class="th-sm">Nombres</th>
                            <th class="th-sm">Apellidos</th>
                            <th class="th-sm">Genero</th>
                            <th class="th-sm">Agregado</th>
                            <th class="th-sm">Estado</th>';
                            if ($privilegio <=2) {
                                $tabla.='<th style="width: 2%"></th>';
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
                    <td>'.$rows['DNI'].'</td>
                    <td>'.$rows['ColportorNombre'].'</td>
                    <td>'.$rows['ColportorApellido'].'</td>
                    <td>'.$rows['ColportorGenero'].'</td>
                    <td>'.$rows['ColportorFechaAdd'].'</td>';
                    
                    if ($rows['ColportorEstado']==1) {
                       $tabla.='<td><span class="badge badge-success">Activo</span></td>';
                    }
                   
                    if ($privilegio<=1) {
                        $tabla.='<td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          Acción
                        </button>
                        <div class="dropdown-menu">
                         <a class="dropdown-item" href="'.SERVERURL.'admin/nueva-factura"><i class="fa fa-gear"></i> Más</a>
                         <a class="dropdown-item crear_usuario" data-codigo="'.$rows['ColportorCodigo'].'" href="'.SERVERURL.'admin/crear-usuario"><i class="fa fa-user"></i> Crear usuario</a>
                          <a class="dropdown-item verDetalle" data-codigo="'.$rows['ColportorCodigo'].'" href="#"><i class="fa fa-eye"></i> Ver</a>
                          <a class="dropdown-item btnEditar" data-codigo="'.$rows['ColportorCodigo'].'" href="#"><i class="fa fa-edit"></i> Editar</a>
                          <a class="dropdown-item btnEliminar" data-codigo="'.$rows['ColportorCodigo'].'" href="#"><i class="fa fa-trash"></i> Eliminar</a>
                        </div>
                    </div>
                        </td>';
                    }
 
                       
                $tabla.='</tr>';
                $contador++;
            }
        }else{
            $tabla.='
            <tr>
                <td colspan="9"><center> No hay registros en el sistema</center> </td>
            </tr>
            ';
        }

        $tabla.='     </tbody>
                    </table>
                 </div>';
        return $tabla;
    }
  
    public function datos_controlador_colportor($tipo, $codigo)
    {
        $codigo = mainModel::limpiar_cadena($codigo);
        $tipo   = mainModel::limpiar_cadena($tipo);

        return ModeloColportor::datos_modelo_colportor($tipo, $codigo);
    }

    public function actualizar_campania_controlador()
    {
        $Id= mainModel::limpiar_cadena($_POST['id_campania-up']);
        $codigo= mainModel::limpiar_cadena($_POST['codigo_campania-up']);
        $nombre_campania= mainModel::limpiar_cadena($_POST['nombre_campania-up']);
        $nombre_campania= strtoupper($nombre_campania);
        $fecha_inicio= mainModel::limpiar_cadena($_POST['fecha_inicio-up']);
        $fecha_fin= mainModel::limpiar_cadena($_POST['fecha_fin-up']);
        $estado= mainModel::limpiar_cadena($_POST['estado']);
    

        $dataUP= [
            "Id"=>$Id,
            "CampaniaCodigo"=>$codigo,
            "NombreCampania"=>$nombre_campania,
            "FechaInicio"=>$fecha_inicio,
            "FechaFin"=>$fecha_fin,
            "Estado"=>$estado,
          ];
        $up = ModeloCampania::actualizar_campania_modelo($dataUP);
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

    public function eliminar_controlador_colportor()
    {
        $codigo = $_POST['codigo_delete'];

        $DelColp = ModeloColportor::eliminar_modelo_colportor($codigo);
        if ($DelColp) {
            $alerta= [
            "Alerta"=>"recargar",
            "Titulo"=>"Colportor eliminado",
            "Texto"=>"Los datos del colportor fue eliminado con exito del sistema",
            "Tipo"=>"success"];
        }else{
            $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"No podemos eliminar esta cuenta en este momento",
            "Tipo"=>"error"];
        }
    }

}

?>