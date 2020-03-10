<?php
 if ($peticionAjax) {
    require_once '../core/mainModel.php';
 }else{
    require_once './core/mainModel.php';
 }

class ModeloColportor extends mainModel
{

    
    protected function agregar_modelo_colportor($datos)
    {
        $sql= mainModel::conectar()->prepare("INSERT INTO colportor (ColportorCodigo, DNI, ColportorNombre, ColportorApellido, ColportorGenero, ColportorDireccion, ColportorCelular, ColportorEmail, ColportorPaisId, ColportorProvinciaId, ColportorCiudadId, ColportorMisionId, ColportorFechaAdd) VALUES (:Codigo,:Dni,:Nombres,:Apellidos,:Genero,:Direccion,:Celular,:Email,:Pais,:Provincia,:Ciudad,:Mision,:FechaAdd)");
        $sql->bindParam(":Codigo", $datos['Codigo']);
        $sql->bindParam(":Dni", $datos['DNI']);
        $sql->bindParam(":Nombres", $datos['Nombres']);
        $sql->bindParam(":Apellidos", $datos['Apellidos']);
        $sql->bindParam(":Genero", $datos['Genero']);
        $sql->bindParam(":Direccion", $datos['Direccion']);
        $sql->bindParam(":Celular", $datos['Celular']);
        $sql->bindParam(":Email", $datos['Email']);
        $sql->bindParam(":Pais", $datos['Pais']);
        $sql->bindParam(":Provincia", $datos['Provincia']);
        $sql->bindParam(":Ciudad", $datos['Ciudad']);
        $sql->bindParam(":Mision", $datos['Mision']);
        $sql->bindParam(":FechaAdd", $datos['FechaAdd']);

        $sql->execute();
        return $sql;
    }

    protected function datos_modelo_colportor($tipo, $codigo)
    {
        if ($tipo=="traer_datos") {
            $query = mainModel::conectar()->prepare("SELECT ColportorCodigo, DNI, ColportorNombre, ColportorApellido,ColportorCelular, ColportorEmail FROM colportor WHERE  ColportorEstado='1'");
        }elseif($tipo == "Conteo"){
            $query = mainModel::conectar()->prepare("SELECT id FROM campania WHERE id!='0'");
            
        }elseif($tipo == "verDetalle"){
            $query = mainModel::conectar()->prepare("SELECT * FROM colportor c INNER JOIN pais p ON c.ColportorPaisId = p.id_pais INNER JOIN provincia pv ON c.ColportorProvinciaId = pv.id_provincia INNER JOIN ciudad cd ON c.ColportorCiudadId = cd.id_ciudad INNER JOIN mision m ON c.ColportorMisionId = m.id_mision WHERE ColportorCodigo=:Codigo");
            $query->bindParam(":Codigo", $codigo);
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
    protected function eliminar_modelo_colportor($codigo){
        $sql= self::conectar()->prepare("DELETE FROM colportor WHERE ColportorCodigo=:Codigo");

        $sql->bindParam(":Codigo", $codigo);
        $sql->execute();

        return $sql;
    }
}
