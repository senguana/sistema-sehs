<?php
 if ($peticionAjax) {
    require_once '../core/mainModel.php';
 }else{
    require_once './core/mainModel.php';
 }

class ModeloLibro extends mainModel
{

    
    protected function agregar_modelo_libro($datos)
    {
        $sql= mainModel::conectar()->prepare("INSERT INTO libro(`codigoLibro`, `nombreLibro`, `estadoLibro`, `precioLibro`, `fechAdd`) VALUES (?,?,?,?,?)");
        $sql->bindParam(1, $datos['LibroCodigo']);
        $sql->bindParam(2, $datos['NombreLibro']);
        $sql->bindParam(3, $datos['EstadoLibro']);
        $sql->bindParam(4, $datos['PrecioLibro']);
        $sql->bindParam(5, $datos['FechaAdd']);
        $sql->execute();
        return $sql;
    }
    
    protected function datos_modelo_libro($tipo, $codigo)
    {
        if ($tipo=="Unico") {
            $query = mainModel::conectar()->prepare("SELECT * FROM libro WHERE codigoLibro=:Codigo");
            $query->bindParam(":Codigo", $codigo);

        }elseif($tipo == "Conteo"){
            $query = mainModel::conectar()->prepare("SELECT idLibro FROM campania WHERE id!='0'");
            
        }elseif ($tipo=="traer_datos_libro") {
            $query = mainModel::conectar()->prepare("SELECT * FROM libro WHERE estadoLibro='1'");
        }elseif ($tipo=="datos_libro") {
            $query = mainModel::conectar()->prepare("SELECT * FROM libro WHERE idLibro=:idLibro");
             $query->bindParam(":idLibro", $codigo);
        }
        $query->execute();

        return $query;
    }
   
    protected function actualizar_modelo_libro($datos)
    {
        $query = mainModel::conectar()->prepare("UPDATE libro SET nombreLibro=:NombreLibro, estadoLibro=:Estado, precioLibro=:Precio,fechAdd=:fechAdd WHERE codigoLibro=:Codigo");
        $query->bindParam(":Codigo", $datos['codigoLibro']);
        $query->bindParam(":NombreLibro", $datos['NombreLibro']);
        $query->bindParam(":Estado", $datos['Estado']);
        $query->bindParam(":Precio", $datos['PrecioLibro']);
        $query->bindParam(":fechAdd", $datos['dateAdd']);
        $query->execute();

        return $query;
    }
    protected function eliminar_modelo_libro($codigo){
        $sql= self::conectar()->prepare("DELETE FROM libro WHERE codigoLibro=:Codigo");
        $sql->bindParam(":Codigo", $codigo);
        $sql->execute();

        return $sql;
    }
}
