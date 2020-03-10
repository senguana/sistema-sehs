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

    

    
}

 ?>
