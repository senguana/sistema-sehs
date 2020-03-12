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
    case 'listarCiudad1':
        $id_provincia = $_POST['id_provincia'];
        $varListarP = $funciones->lisTablaControlador("ciudad", $id_provincia);
        $dato = $varListarP->fetch();
        echo json_encode($dato);
        break;
    case 'listar_provincia':
    	 $varListarP = $funciones->lisTablaControladorProvincia();
      $i= 1;
        while ($reg = $varListarP->fetch(PDO::FETCH_OBJ)) {
            echo '<li>
                  <p><input type="radio" onchange="mos($(this).val())" class="flat" value="' . $reg->id_provincia . '" id="selector-provincia" name="optionsProvincia"> '. $i++ . '.-' . $reg->NombreProvincia. '<input type="hidden" id="selector_ciudad" value="'.$reg->id_ciudad. '" name=""> <span id="' . '">('.$reg->NombreCiudad . ')</span></p>
                  <div id="input"></div>
                  </li>';
        }
    	break;
 	default:
 		# code...
 		break;
 }
 
 ?>