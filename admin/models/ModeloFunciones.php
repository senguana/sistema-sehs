<?php

if ($peticionAjax) {
    require_once '../core/mainModel.php';
 }else{
    require_once './core/mainModel.php';
 }



class ModeloFunciones extends mainModel
{

    public function listarPais()
    {
        $sql= mainModel::conectar()->prepare("SELECT * FROM pais");
        $sql->execute();
        return $sql;
    }
    protected function lisTablaModelo($tabla, $id, $op)
    {
        $sql= mainModel::conectar()->prepare("SELECT * FROM $tabla WHERE $op=:Id");
        $sql->bindParam(":Id",$id);
        $sql->execute();
        return $sql; 
    }
    public function listarMision()
    {
        
        $sql= mainModel::conectar()->prepare("SELECT * FROM mision");
        $sql->execute();
        return $sql; 
    }
     public function listarLibro()
    {
        
        $sql= mainModel::conectar()->prepare("SELECT * FROM libro WHERE estadoLibro !='0'");
        $sql->execute();
        return $sql; 
    }
}
