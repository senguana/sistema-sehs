<?php 
 $peticionAjax= true;
 require_once '../core/configGeneral.php';
 include_once '../controllers/ControladorFunciones.php';
 $funciones= new ControladorFunciones();
 $metodo = $_GET['op'];
 switch ($metodo) {
 	case 'listarProvincia':
 		$id_pais = $_POST['id_pais'];
 		$varListarP = $funciones->lisTablaControlador("provincia", $id_pais);
            echo '<option value="0">Seleccionar Provincia</option>';
        while ($reg = $varListarP->fetch(PDO::FETCH_OBJ)) {
            echo '<option value="' . $reg->id_provincia. '">' . $reg->NombreProvincia . '</option>';
        }
 		break;
 	case 'listarCiudad':
 		$id_provincia = $_POST['id_provincia'];
 		$varListarP = $funciones->lisTablaControlador("ciudad", $id_provincia);
        while ($reg = $varListarP->fetch(PDO::FETCH_OBJ)) {
            echo '<option value="' . $reg->id_ciudad. '">' . $reg->NombreCiudad	 . '</option>';
        }
 		break;
 	default:
 		# code...
 		break;
 }
 
 ?>