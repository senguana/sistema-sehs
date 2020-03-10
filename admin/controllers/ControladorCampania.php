<?php 


if ($peticionAjax) {
    require_once '../models/ModeloCampania.php';
 }else{
    require_once './models/ModeloCampania.php';
 }

 /**
  * 
  */
class ControladorCampania extends ModeloCampania
{
    public function agregar_controlador_campania()
    {
        $nombre_campania= mainModel::limpiar_cadena($_POST['nombre_campania-reg']);
        $nombre_campania = strtoupper($nombre_campania);
        $fecha_inicio= mainModel::limpiar_cadena($_POST['fecha_inicio-reg']);
        $fecha_fin = mainModel::limpiar_cadena($_POST['fecha_fin-reg']);
        $fecha_add = date("Y-m-d H:i:s");
        $consulta1= mainModel::ejecutar_consulta_simple("SELECT NombreCampania FROM campania WHERE NombreCampania='$nombre_campania'");
        if ($consulta1->rowCount()>=1) {
            $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"El Nombre de la Campania que ingresaste ya se ecuentra registrado!",
            "Tipo"=>"error"];
        }else{
            if ($fecha_inicio > $fecha_fin) {
                $alerta= [
                "Alerta"=>"limpiar",
                "Titulo"=>"Ocurrio un error inesperado",
                "Texto"=>"La fecha inicio no puede ser mayor a la fecha fin!",
                "Tipo"=>"error"];
            }else{
                $consulta2= mainModel::ejecutar_consulta_simple("SELECT id FROM campania");
                $numero=($consulta2->rowCount())+1;
                $codigo= mainModel::generar_codigo_aleatorio("CAMP-",7,$numero);

                $dataCampania=[
                    "CampaniaCodigo"=>$codigo,
                    "NombreCampania"=>$nombre_campania,
                    "FechaInicio"=>$fecha_inicio,
                    "FechaFin"=>$fecha_fin,
                    "FechaAdd"=>$fecha_add,
                    "Estado"=>1
                ];
                $guardarCampania = ModeloCampania::agregar_modelo_campania($dataCampania);
                if ($guardarCampania->rowCount()>=1){
                    $alerta= [
                    "Alerta"=>"recargar",
                    "Titulo"=>"Campania Registrado",
                    "Texto"=>"La Campania se registro exitosamente!",
                    "Tipo"=>"success"];

                }else{
                    $alerta= [
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No se pudo registrar la Campania",
                    "Tipo"=>"error"];
                }
            }
            
        }

        return mainModel::sweet_alert($alerta);
    }

    public function datos_controlador_campania_activos($privilegio, $tipo)
    {
        $privilegio = mainModel::limpiar_cadena($privilegio);
        $tipo = mainModel::limpiar_cadena($tipo);
        $tabla = "";

        $conexion = mainModel::conectar();

        $datos = $conexion->query(
            "SELECT * FROM campania WHERE EstadoCampania='1' ORDER BY NombreCampania ASC");

        $registros = $datos->fetchAll();

        $tabla.='<div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped jambo_table bulk_action" style="width:100%">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="th-sm">Código</th>
                            <th class="th-sm">Nombre de campanña</th>
                            <th class="th-sm">Inicio de la campania</th>
                            <th class="th-sm">Fin de la campania</th>
                            <th class="th-sm">Fecha agregado</th>
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
                    <td>'.$rows['CampaniaCodigo'].'</td>
                    <td>'.$rows['NombreCampania'].'</td>
                    <td>'.$rows['FechaInicioCampania'].'</td>
                    <td>'.$rows['FechaFinCampania'].'</td>
                    <td>'.$rows['FechaAddCampania'].'</td>';
                    
                    if ($rows['EstadoCampania']==1) {
                       $tabla.='<td><span class="badge badge-success">Activo</span></td>';
                    }
                   
                    if ($privilegio<=1) {
                        $tabla.='<td>
                            <button class="btn btn-success btn-sm bnEditarCampania" data-codigo="'.$rows['CampaniaCodigo'].'"  type="button"><i class="fa fa-edit" ></i> </button>
                       
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
    public function datos_controlador_campania_inactivos($privilegio, $tipo)
    {
        $privilegio = mainModel::limpiar_cadena($privilegio);
        $tipo = mainModel::limpiar_cadena($tipo);
        $tabla = "";

        $conexion = mainModel::conectar();

        $datos = $conexion->query(
            "SELECT * FROM campania WHERE EstadoCampania='0' ORDER BY NombreCampania ASC");

        $registros = $datos->fetchAll();

        $tabla.='<div class="card-box table-responsive">
                    <table id="datatable1" class="table table-striped jambo_table bulk_action" style="width:100%">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="th-sm">Código</th>
                            <th class="th-sm">Nombre de campanña</th>
                            <th class="th-sm">Inicio de la campania</th>
                            <th class="th-sm">Fin de la campania</th>
                            <th class="th-sm">Fecha agregado</th>
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
                    <td>'.$rows['CampaniaCodigo'].'</td>
                    <td>'.$rows['NombreCampania'].'</td>
                    <td>'.$rows['FechaInicioCampania'].'</td>
                    <td>'.$rows['FechaFinCampania'].'</td>
                    <td>'.$rows['FechaAddCampania'].'</td>';
                    
                    if ($rows['EstadoCampania']==0) {
                       $tabla.='<td><span class="badge badge-danger">Inactivo</span></td>';
                    }
                   
                    if ($privilegio<=2) {
                        $tabla.='<td>
                            <button class="btn btn-success btn-sm btnEditarEstado"  type="button" data-codigo="'.$rows['CampaniaCodigo'].'"><i class="fa fa-edit" ></i> </button>

                        ';
                    } 
                    if($privilegio==1){
                        $tabla.='
                            <form data-form="delete" action="'.SERVERURL.'admin/ajax/campaniaAjax.php" method="POST" class="FormularioAjax" autocomplete="off">
                                <input type="text" hidden="" name="codigo-delete" value="'.mainModel::encryption($rows['CampaniaCodigo']).'">
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
                <td colspan="8"> No hay registros en el sistema </td>
            </tr>
            ';
        }

        $tabla.='     </tbody>
                    </table>
                 </div>';
        return $tabla;
    }

    public function datos_campania_controlador($tipo, $codigo)
    {
        $codigo = mainModel::limpiar_cadena($codigo);
        $tipo   = mainModel::limpiar_cadena($tipo);

        return ModeloCampania::datos_campania_modelo($tipo, $codigo);
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

    public function eliminar_campania_controlador()
    {
        $codigo = mainModel::decryption($_POST['codigo-delete']);

        $DelCampania = ModeloCampania::eliminar_campania_modelo($codigo);
        if ($DelCampania) {
            $alerta= [
            "Alerta"=>"recargar",
            "Titulo"=>"Campaña eliminado",
            "Texto"=>"La Campaña fue eliminado con exito del sistema",
            "Tipo"=>"success"];
        }else{
            $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"No podemos eliminar esta cuenta en este momento",
            "Tipo"=>"error"];
        }
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