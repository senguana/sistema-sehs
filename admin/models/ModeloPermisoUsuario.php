<?php
 include_once './../core/bd/BDconect.php';
 
class ModeloPermisoUsuario
{
    public function __construct()
    {
    }
    public function listarActivo()
    {   
        global $db;
        $db=Db::conectar();
        
        $consulta = "SELECT * FROM tb_campania  WHERE estado = 1 ORDER BY id_campania DESC ";
        $resultado = $db->prepare($consulta);
        $resultado->execute();
        return $resultado;
    }

     public function listarInactivo()
    {   
        global $db;
        $db=Db::conectar();
        
        $consulta = "SELECT * FROM tb_campania  WHERE estado = 0 ORDER BY id_campania DESC";
        $resultado = $db->prepare($consulta);
        $resultado->execute();
        return $resultado;
    }
    public function registrar($id_campania, $id_usuario, $provincia, $ciudad )
    {
        global $db;
        $db=Db::conectar();
        $consulta  = "INSERT INTO tb_campania_provincia(campania_id, usuario_id, provincia_id, ciudad_id) VALUES (?,?,?,?)";
        $insertar=$db->prepare($consulta );
        $insertar->bindParam(1, $id_campania);
        $insertar->bindParam(2, $id_usuario);
        $insertar->bindParam(3, $provincia);
        $insertar->bindParam(4, $ciudad);
        $insertar->execute();
        return $insertar;
    }
    public function actualizar($id_campania, $nombre_campania, $fech_inicio, $fech_fin, $date_added, $estado)
    {
        global $db;
        $db=Db::conectar();
        $consulta  = "UPDATE tb_campania SET name_campania=?, date_start=?, date_end=?,date_add=?, estado=? WHERE id_campania=?";
        $insertar=$db->prepare($consulta );
        $insertar->bindParam(1, $nombre_campania);
        $insertar->bindParam(2, $fech_inicio);
        $insertar->bindParam(3, $fech_fin);
        $insertar->bindParam(4, $date_added);
        $insertar->bindParam(5, $estado);
        $insertar->bindParam(6, $id_campania);
        $insertar->execute();
        return $insertar;
    }
    public function actualizar_estado($id_user, $estado)
    {
        global $db;
        $db=Db::conectar();
        $consulta  = "UPDATE tb_campania SET estado =? WHERE id_campania=?";
        $insertar=$db->prepare($consulta );
        $insertar->bindParam(1, $estado);
        $insertar->bindParam(2, $id_user);
        $insertar->execute();
        return $insertar;
    }
    
    
    public function eliminar($id)
    {
        global $db;
        $db=Db::conectar();
        $consulta  = "DELETE FROM tb_campania WHERE id_campania =?";
        $resultado = $db->prepare($consulta);
        $resultado->execute([$id]);

        return $resultado;
    }

    public function Buscar_campania($search)
    {
        global $db;
        $db=Db::conectar();
        $consulta = "SELECT * FROM tb_campania WHERE name_campania LIKE :b";

        $resultado = $db->prepare($consulta);
        $resultado->bindParam(':b', $search);
        $resultado->execute();

        return $resultado;
    }
   
    public function Buscar_usuario($search)
    {
        global $db;
        $db=Db::conectar();
        $consulta = "SELECT * FROM tb_user WHERE username LIKE :b";

        $resultado = $db->prepare($consulta);
        $resultado->bindParam(':b', $search);
        $resultado->execute();

        return $resultado;
    }

    public function usuario_existe($id_person)
    {
        global $db;
        $db=Db::conectar();
        $consulta = "SELECT * FROM tb_user WHERE person_id =:b";

        $resultado = $db->prepare($consulta);
        $resultado->bindParam(':b', $id_person);
        $resultado->execute();

        return $resultado;
    }
     public function getDetails($id)
    {
        global $db;
        $db=Db::conectar();
        $consulta = "SELECT * FROM tb_campania WHERE id_campania = ?";

        $resultado = $db->prepare($consulta);
        $resultado->execute([$id]);

        return $resultado;
    }
}
