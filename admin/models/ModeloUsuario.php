<?php
 if ($peticionAjax) {
    require_once '../core/mainModel.php';
 }else{
    require_once './core/mainModel.php';
 }

class ModeloUsuario extends mainModel
{

    
    protected function agregar_modelo_usuario($datos)
    {
        $sql= mainModel::conectar()->prepare("UPDATE `colportor` SET CuentaCodigo=:Codigo WHERE ColportorCodigo=:CodigoColportor");
        $sql->bindParam(":Codigo", $datos['CodigoCuenta']);
        $sql->bindParam(":CodigoColportor", $datos['CodigoColportor']);
        $sql->execute();
        return $sql;
    }
    
    protected function datos_modelo_usuario($tipo, $codigo)
    {
        if ($tipo=="Unico") {
            $query = mainModel::conectar()->prepare("SELECT * FROM colportor c INNER JOIN cuenta ct ON c.CuentaCodigo = ct.CuentaCodigo WHERE ColportorCodigo=:Codigo");
            $query->bindParam(":Codigo", $codigo);

        }elseif ($tipo=="Unico1") {
            $query = mainModel::conectar()->prepare("SELECT * FROM cuenta WHERE CuentaCodigo=:Codigo");
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

    protected function actualizar_modelo_usuario_user($datos)
    {
        $query = mainModel::conectar()->prepare("UPDATE cuenta SET CuentaUsuario=:Usuario WHERE CuentaCodigo=:Codigo");
        $query->bindParam(":Usuario", $datos['Usuario']);
        $query->bindParam(":Codigo", $datos['CodigoCuenta']);
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
