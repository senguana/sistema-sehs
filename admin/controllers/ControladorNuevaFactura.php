<?php 


if ($peticionAjax) {
    require_once '../models/ModeloNuevaFactura.php';
 }else{
    require_once './models/ModeloNuevaFactura.php';
 }

 /**
  * 
  */
class ControladorNuevaFactura extends ModeloNuevaFactura
{
    public function agregar_controlador_nueva_factura()
    {   

      $fecha               = date("Y-m-d H:i:s");    
      $colportor           = mainModel::limpiar_cadena($_POST['codigo_colportor']);
      $encargado           = mainModel::limpiar_cadena($_POST['encargado']);
      $subTotalValue       = mainModel::limpiar_cadena($_POST['subTotalValue']);
      $vatValue            = mainModel::limpiar_cadena($_POST['vatValue']);
      $totalAmountValue    = mainModel::limpiar_cadena($_POST['totalAmountValue']);
      $discount            = mainModel::limpiar_cadena($_POST['discount']);
      $grandTotalValue     = mainModel::limpiar_cadena($_POST['grandTotalValue']);
      $paid                = mainModel::limpiar_cadena($_POST['paid']);
      $dueValue            = mainModel::limpiar_cadena($_POST['dueValue']);
      $paymentType         = mainModel::limpiar_cadena($_POST['paymentType']);
      $paymentStatus       = mainModel::limpiar_cadena($_POST['paymentStatus']);
         $consulta1= mainModel::ejecutar_consulta_simple("SELECT ColportorCodigo FROM pedido WHERE ColportorCodigo='$colportor'");
        if ($consulta1->rowCount()>=1) {
             $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"El Colportor que seleccionaste ya fue tomanda, seleccione otro colportor para realizar el pedido!",
            "Tipo"=>"error"];
         }
        elseif ($colportor=="") {
            $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"Campo colportor vacio!",
            "Tipo"=>"error"];
        }else{
            $consulta2= mainModel::ejecutar_consulta_simple("SELECT pedidoId FROM pedido");
                $numero=($consulta1->rowCount())+1;
                $codigo= mainModel::generar_codigo_aleatorio("1",7,$numero);
            $dataNF = [
                "CodigoPedido"=>$codigo,
                "FechaNF"=>$fecha,
                "CodigoColportor"=>$colportor,
                "EncargadoPedido"=>$encargado,
                "SubTotal"=>$subTotalValue,
                "DiezmoNF"=>$vatValue,
                "CantidadTotal"=>$totalAmountValue,
                "Descuento"=>$discount,
                "Total"=>$grandTotalValue,
                "Pagado"=>$paid,
                "Saldo"=>$dueValue,
                "MetodoPago"=>$paymentType,
                "EstadoPago"=>$paymentStatus,
                "PedidoEstado"=>1
            ];
              
            $agregarNF = ModeloNuevaFactura::agregar_modelo_nueva_factura($dataNF);
   
            if($agregarNF->rowCount()>=1){
             
                for($x = 0; $x < count($_POST['productName']); $x++) {          
                $actualizarCantidadLibro = "SELECT libro.cantidad FROM libro WHERE libro.idLibro = ".$_POST['productName'][$x]."";
                $actualizarCantidadDato = mainModel::ejecutar_consulta_simple($actualizarCantidadLibro);
                   
                while ($actualizarCantidadLibro = $actualizarCantidadDato->fetch()) {
                    $updateQuantity[$x] = $actualizarCantidadLibro[0] - $_POST['quantity'][$x];                         
                        // update product table
                        $actualizarLibroTabla = "UPDATE libro SET cantidad = '".$updateQuantity[$x]."' WHERE idLibro = ".$_POST['productName'][$x]."";
                        mainModel::ejecutar_consulta_simple($actualizarLibroTabla);

                        // add into order_item
                        $pedidoItemSql = "INSERT INTO `pedido_item`(`CodigoPedido`, `codigoLibro`, `cantidad`, `tarifa`, `total`, `pedido_item_estado`) VALUES ('$codigo', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rateValue'][$x]."', '".$_POST['totalValue'][$x]."', 1)";

                        mainModel::ejecutar_consulta_simple($pedidoItemSql);     

                        if($x == count($_POST['productName'])) {
                            $orderItemStatus = true;
                        }       
                } // while  
            } // /for quantity
                $alerta= [
                "Alerta"=>"recargar",
                "Titulo"=>"Agregado",
                "Texto"=>"Nueva factura agregado exitosamente",
                "Tipo"=>"success"];
            }else{
                $alerta= [
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"No hemos podido agregar nueva factura!",
            "Tipo"=>"error"];
            }
        }
        return mainModel::sweet_alert($alerta);
    }

    public function eliminar_controlador_nueva_factura()
    {
        $id_tmp = mainModel::limpiar_cadena($_GET['id']);
        $id_tmp=intval($id_tmp);

        return ModeloNuevaFactura::eliminar_modelo_nueva_factura($id_tmp);
    }
    public function datos_controlador_nueva_factura($tipo, $codigo)
    {
        $tipo = mainModel::limpiar_cadena($tipo);
        $codigo   = mainModel::limpiar_cadena($codigo);

        return ModeloNuevaFactura::datos_modelo_nueva_factura($tipo, $codigo);
    }
    public function paginador_controlador_pedido($privilegio, $session)
    {
        $privilegio = mainModel::limpiar_cadena($privilegio);
        $codigo = mainModel::limpiar_cadena($session);
        $tabla = "";

        $conexion = mainModel::conectar();

        $datos = $conexion->query(
            "SELECT * FROM pedido, colportor WHERE colportor.ColportorCodigo=pedido.ColportorCodigo AND EncargadoPedido='$session' AND pedidoEstado='1'");
        $tabla.='<div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped jambo_table bulk_action" style="width:100%">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th>CodigoPedido</th>
                            <th>Fecha</th>
                            <th>Colportor</th>
                            <th>Encargado pedido</th>
                            <th>Total libros</th>
                            <th>Estado del pago</th>
                            <th>Acción pedido</th>
                            </tr>
                        </thead>
                        <tbody>';
        if ($datos->rowCount()>0) {
            $contador = 1;
            while ($rows = $datos->fetch()) {
               $pedido_id=$rows['CodigoPedido'];

               $countPedidoItemSql = $conexion->query("SELECT count(*) FROM pedido_item WHERE CodigoPedido = '$pedido_id'"); 
               $itemCountRow = $countPedidoItemSql->fetch();
                $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td>'.$rows['CodigoPedido'].'</td>
                    <td>'.$rows['pedidoFecha'].'</td>
                    <td><a href="#" type="button" data-toggle="tooltip" data-placement="top" title="'.$rows['ColportorCelular'].'-'.$rows['ColportorEmail'].'">
                     '.$rows['ColportorNombre']." ".$rows['ColportorApellido'].'</a></td>

                                  
                    <td>'.$rows['EncargadoPedido'].'</td>
                    <td>'.$itemCountRow[0].'</td>';
                    if ($rows[13]==1) {
                        $tabla.='<td><label class="label label-success">Pago completo</label></td>';
                    }elseif ($rows[13]==2) {
                        $tabla.='<td><label class="label label-success">Pago completo</label></td>';
                    }elseif ($rows[13]==3) {
                        $tabla.='<td><span class="badge bg-green">Pago completo</span></td>';
                    }
                    if($privilegio==1){
                        $tabla.='<td>
                                    <form data-form="delete" action="'.SERVERURL.'admin/ajax/administradorAjax.php" method="POST" class="FormularioAjax" autocomplete="off">
                                        <input type="text" hidden="" name="codigo-delete" value="">
                                        <input type="text" hidden="" name="privilegio-admin" value="">
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

}

?>