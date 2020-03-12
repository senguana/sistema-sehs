 <?php 
$peticionAjax = true;
if ($peticionAjax) {
    include_once  '../models/ModeloFunciones.php';
 }else{
    include_once './models/ModeloFunciones.php';
 }

 
class ControladorFunciones extends ModeloFunciones
{
    
    public function lisTablaControlador($tabla, $id)
    {
        if ($tabla=="provincia") {
            $datos = ModeloFunciones::lisTablaModelo($tabla, $id, "PaisId");
        }elseif ($tabla=="ciudad") {
            $datos = ModeloFunciones::lisTablaModelo($tabla, $id, "provinciaId");
        }
        

        return $datos;
    }
    public function lisTablaControladorProvincia()
    {
        $datos = mainModel::ejecutar_consulta_simple("SELECT * FROM ciudad c INNER JOIN provincia p ON c.provinciaId = p.id_provincia");


        return $datos;
    }
    

    
}

 ?>
