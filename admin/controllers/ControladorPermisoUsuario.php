 <?php
$metodo = $_GET['op'];
require '../funciones/ModeloFunciones.php';
require '../models/ModeloPermisoUsuario.php';
$objFunciones      = new ModeloFunciones();
$objPermisoUsuario = new ModeloPermisoUsuario();
switch ($metodo){
    case 'listarProvincia':
      $varListarP = $objFunciones->listarCiudad();
      $i= 1;
        while ($reg = $varListarP->fetch(PDO::FETCH_OBJ)) {
            echo '<li>
                  <p><input type="radio" value="' . $reg->id_province . '" id="selector-provincia" name="optionsProvincia"> '. $i++ . '.-' . $reg->name_province . '<input type="hidden" id="selector-ciudad" value="' .$reg->id_city. '" name="optionsCiudad"> <span id="' . '">('.$reg->name_city . ')</span></p>
                </li>';
        }
    break;
    case 'listarProvincia1':
      $varListarP = $objFunciones->listarCiudad1();
      $i= 9;
        while ($reg = $varListarP->fetch(PDO::FETCH_OBJ)) {
            echo '<li>
                  <p><input type="radio" value="' . $reg->id_province . '" id="selector-provincia"  name="optionsProvincia"> '. $i++ . '.-' . $reg->name_province . '<input type="hidden" id="selector-ciudad" value="' .$reg->id_city. '" name="optionsCiudad">  <span>('.$reg->name_city . ')</span></p>
                </li>';
        }
    break;
    case 'listarProvincia2':
      $varListarP = $objFunciones->listarCiudad2();
      $i= 17;
        while ($reg = $varListarP->fetch(PDO::FETCH_OBJ)) {
            echo '<li>
                  <p><input type="radio" value="' . $reg->id_province . '" id="selector-provincia"  name="optionsProvincia"> '. $i++ . '.-' . $reg->name_province . '<input type="hidden" id="selector-ciudad" value="' .$reg->id_city. '" name="optionsCiudad"> <span>('.$reg->name_city . ')</span></p>
                </li>';
        }
    break;
    case 'guardar':
        $id_campania        = $_POST['campania_id'];
        $id_usuario         = $_POST['usuario_id'];
        $provincia          = $_POST['optionsProvincia'];
        $ciudad             = $_POST['optionsCiudad'];
        
        
        $json = array(); 
        if (!empty($_POST['campania_id'])) {
            
                $varRegistrar = $objPermisoUsuario->registrar($id_campania, $id_usuario, $provincia, $ciudad );
                if ($varRegistrar) {
                    $json[] = array('mensaje' => '1' );
                } else {
                    $json[] = array('mensaje' => '1' );
                }
            
        }
        
       echo json_encode($json);
           
        break;
}
?>