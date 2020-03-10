<?php
 if ($peticionAjax) {
    require_once '../core/mainModel.php';
 }else{
    require_once './core/mainModel.php';
 }

class ModeloCampania extends mainModel
{

    
    protected function agregar_modelo_campania($datos)
    {
        $sql= mainModel::conectar()->prepare("INSERT INTO campania(CampaniaCodigo,NombreCampania, FechaInicioCampania, FechaFinCampania, FechaAddCampania, EstadoCampania) VALUES (?,?,?,?,?,?)");
        $sql->bindParam(1, $datos['CampaniaCodigo']);
        $sql->bindParam(2, $datos['NombreCampania']);
        $sql->bindParam(3, $datos['FechaInicio']);
        $sql->bindParam(4, $datos['FechaFin']);
        $sql->bindParam(5, $datos['FechaAdd']);
        $sql->bindParam(6, $datos['Estado']);
        $sql->execute();
        return $sql;
    }
    
    protected function datos_campania_modelo($tipo, $codigo)
    {
        if ($tipo=="Unico") {
            $query = mainModel::conectar()->prepare("SELECT * FROM campania WHERE CampaniaCodigo=:Codigo");
            $query->bindParam(":Codigo", $codigo);

        }elseif($tipo == "Conteo"){
            $query = mainModel::conectar()->prepare("SELECT id FROM campania WHERE id!='0'");
            
        }
        $query->execute();

        return $query;
    }
   
    protected function actualizar_campania_modelo($datos)
    {
        $query = mainModel::conectar()->prepare("UPDATE campania SET CampaniaCodigo=:Codigo,NombreCampania=:NombreCampania,FechaInicioCampania=:FechaInicio,FechaFinCampania=:FechaFin,EstadoCampania=:Estado WHERE Id=:Id");
        $query->bindParam(":Codigo", $datos['CampaniaCodigo']);
        $query->bindParam(":NombreCampania", $datos['NombreCampania']);
        $query->bindParam(":FechaInicio", $datos['FechaInicio']);
        $query->bindParam(":FechaFin", $datos['FechaFin']);
        $query->bindParam(":Estado", $datos['Estado']);
        $query->bindParam(":Id", $datos['Id']);
        $query->execute();

        return $query;
    }
    protected function actualizar_estado_campania_modelo($datos)
    {
        $query = mainModel::conectar()->prepare("UPDATE campania SET EstadoCampania=:Estado WHERE CampaniaCodigo=:Codigo");
  
        $query->bindParam(":Estado", $datos['Estado']);
        $query->bindParam(":Codigo", $datos['Codigo']);
        $query->execute();

        return $query;
    }
    protected function eliminar_campania_modelo($codigo){
        $sql= self::conectar()->prepare("DELETE FROM campania WHERE CampaniaCodigo=:Codigo");

        $sql->bindParam(":Codigo", $codigo);
        $sql->execute();

        return $sql;
    }
}
