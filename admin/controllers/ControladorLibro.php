<?php 


if ($peticionAjax) {
    require_once '../models/ModeloLibro.php';
 }else{
    require_once './models/ModeloLibro.php';
 }

 /**
  * 
  */
class ControladorLibro extends ModeloLibro
{
    public function agregar_controlador_libro()
    {
        $nombre_libro= mainModel::limpiar_cadena($_POST['nombre_libro-reg']);
        $nombre_libro = strtoupper($nombre_libro);
        $estado = mainModel::limpiar_cadena($_POST['estado-reg']);
        $estado= intval($estado);
        $precio= mainModel::limpiar_cadena($_POST['precio-reg']);
        $precio= floatval($precio);
        $fecha_add = date("Y-m-d H:i:s");
        $consulta1= mainModel::ejecutar_consulta_simple("SELECT nombreLibro FROM libro WHERE nombreLibro='$nombre_libro'");
        if ($consulta1->rowCount()>=1) {
            $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"El Nombre del libro que ingresaste ya se ecuentra registrado!",
            "Tipo"=>"error"];
        }else{
            $consulta2= mainModel::ejecutar_consulta_simple("SELECT idLibro FROM libro");
            $numero=($consulta2->rowCount())+1;
            $codigo= mainModel::generar_codigo_aleatorio("LIB-SEHS",6,$numero);

            $dataLib=[
                "LibroCodigo"=>$codigo,
                "NombreLibro"=>$nombre_libro,
                "EstadoLibro"=>$estado,
                "PrecioLibro"=>$precio,
                "FechaAdd"=>$fecha_add
            ];
            $guardarLibro = ModeloLibro::agregar_modelo_libro($dataLib);
            if ($guardarLibro->rowCount()>=1){
                $alerta= [
                "Alerta"=>"recargar",
                "Titulo"=>"Libro Registrado",
                "Texto"=>"El libro se registro exitosamente!",
                "Tipo"=>"success"];

            }else{
                $alerta= [
                "Alerta"=>"simple",
                "Titulo"=>"Ocurrio un error inesperado",
                "Texto"=>"No se pudo registrar la Campania",
                "Tipo"=>"error"];
            }
            
        }

        return mainModel::sweet_alert($alerta);
    }

    public function tabla_controlador_libro($privilegio, $tipo)
    {
        $privilegio = mainModel::limpiar_cadena($privilegio);
        $tipo = mainModel::limpiar_cadena($tipo);
        $tabla = "";

        $conexion = mainModel::conectar();

        $datos = $conexion->query(
            "SELECT * FROM libro ORDER BY nombreLibro ASC");

        $registros = $datos->fetchAll();

        $tabla.='<div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped jambo_table bulk_action" style="width:100%">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="th-sm">Código</th>
                            <th class="th-sm">Libro</th>
                            <th class="th-sm">Agregado</th>
                            <th class="text-right">Precio</th>
                            <th class="th-sm">Estado</th>';
                            if ($privilegio <=2) {
                                $tabla.='<th style="width: 2%">Acción</th>';
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
                    <td>'.$rows['codigoLibro'].'</td>
                    <td>'.$rows['nombreLibro'].'</td>
                    <td>'.$rows['fechAdd'].'</td>
                    <td>$ <span class="pull-right">'.number_format($rows['precioLibro'],2) .'</span></td>';
                    
                    if ($rows['estadoLibro']==1) {
                       $tabla.='<td><span class="badge badge-success">Activo</span></td>';
                    }else{
                       $tabla.='<td><span class="badge badge-warning">Inactivo</span></td>'; 
                    }
                   
                    if ($privilegio<=1) {
                        $tabla.='<td>
                            <button class="btn btn-success btn-sm btnEditar" data-codigo="'.$rows['codigoLibro'].'"  type="button"><i class="fa fa-edit" ></i> </button>
                            <form data-form="delete" action="'.SERVERURL.'admin/ajax/libroAjax.php" method="POST" class="FormularioAjax" autocomplete="off">
                                <input type="text" hidden="" name="codigo-delete" value="'.mainModel::encryption($rows['codigoLibro']).'">
                                <button class="btn btn-danger btn-sm"  type="submit"><i class="glyphicon glyphicon-trash"></i> </button>
                            </form>
                            
                       
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
    
    public function datos_controlador_libro($tipo, $codigo)
    {
        $codigo = mainModel::limpiar_cadena($codigo);
        $tipo   = mainModel::limpiar_cadena($tipo);

        return ModeloLibro::datos_modelo_libro($tipo, $codigo);
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