<?php
 if ($peticionAjax) {
    require_once '../core/mainModel.php';
 }else{
    require_once './core/mainModel.php';
 }

class ModeloNuevaFactura extends mainModel
{

    
    protected function agregar_modelo_nueva_factura($datos)
    {
        $sql= mainModel::conectar()->prepare("INSERT INTO `pedido`(CodigoPedido,`pedidoFecha`, `ColportorCodigo`, `EncargadoPedido`, `SubTotal`, `Diezmo`, `CantidadTotal`, `Descuento`, `Total`, `MontoPagado`, `Saldo`, `MetodoPago`, `PagoEstado`, `PedidoEstado`) VALUES  (:CodigoPedido,:FechaNF, :CodigoColportor, :EncargadoPedido, :SubTotal, :DiezmoNF, :CantidadTotal, :Descuento, :Total, :Pagado, :Saldo, :MetodoPago, :EstadoPago, :PedidoEstado)");
        $sql->bindParam(":CodigoPedido", $datos['CodigoPedido']);
        $sql->bindParam(":FechaNF", $datos['FechaNF']);
        $sql->bindParam(":CodigoColportor", $datos['CodigoColportor']);
        $sql->bindParam(":EncargadoPedido", $datos['EncargadoPedido']);
        $sql->bindParam(":SubTotal", $datos['SubTotal']);
        $sql->bindParam(":DiezmoNF", $datos['DiezmoNF']);
        $sql->bindParam(":CantidadTotal", $datos['CantidadTotal']);
        $sql->bindParam(":Descuento", $datos['Descuento']);
        $sql->bindParam(":Total", $datos['Total']);
        $sql->bindParam(":Pagado", $datos['Pagado']);
        $sql->bindParam(":Saldo", $datos['Saldo']);
        $sql->bindParam(":MetodoPago", $datos['MetodoPago']);
        $sql->bindParam(":EstadoPago", $datos['EstadoPago']);
        $sql->bindParam(":PedidoEstado", $datos['PedidoEstado']);
        $sql->execute();
        
        return $sql;
    }

    public function actualizar_libro_cantidad($datos)
        {
            $sql= mainModel::conectar()->prepare();
            return $sql;
        }    
    protected function datos_modelo_nueva_factura($tipo, $codigo)
    {
        if ($tipo=="Unico") {
            $query = mainModel::conectar()->prepare("SELECT * FROM campania WHERE CampaniaCodigo=:Codigo");
            $query->bindParam(":Codigo", $codigo);

        }elseif($tipo == "Conteo"){
            $query = mainModel::conectar()->prepare("SELECT id FROM campania WHERE id!='0'");
            
        }elseif($tipo == "verDetalle"){
            $query = mainModel::conectar()->prepare("SELECT * FROM colportor c INNER JOIN pais p ON c.ColportorPaisId = p.id_pais INNER JOIN provincia pv ON c.ColportorProvinciaId = pv.id_provincia INNER JOIN ciudad cd ON c.ColportorCiudadId = cd.id_ciudad INNER JOIN mision m ON c.ColportorMisionId = m.id_mision WHERE ColportorCodigo=:Codigo");
            $query->bindParam(":Codigo", $codigo);
        }elseif ($tipo=="colportor") {
            $query = mainModel::conectar()->prepare("SELECT ColportorNombre, ColportorApellido  FROM colportor");
        }elseif ($tipo=="traer_datos_libro") {
            $query = mainModel::conectar()->prepare("SELECT ColportorNombre, ColportorApellido  FROM colportor");
           
        }elseif ($tipo=="datos_tmp") {
            $query = mainModel::conectar()->prepare("SELECT * FROM libro, tmp where libro.idLibro=tmp.idLibro and tmp.session_id=:Session ");
           $query->bindParam(":Session", $codigo);
        }
        $query->execute();

        return $query;
    }
   
    
    protected function eliminar_modelo_nueva_factura($codigo){
        $sql= self::conectar()->prepare("DELETE FROM tmp WHERE id_tmp=:id_tmp");

        $sql->bindParam(":id_tmp", $codigo);
        $sql->execute();

        return $sql;
    }
}
