<?php 
 $peticionAjax= true;

 require_once '../core/configGeneral.php';
     session_start();
    
     $session_id= session_id();
 if (isset($_POST['nombre_colportor']) || isset($_POST['cantidad']) || isset($_GET['id']) || isset($_POST['pedidos']) || isset($_POST['codigo_colportor'])) {

 	require_once '../controllers/ControladorNuevaFactura.php';
 	$insNF = new ControladorNuevaFactura();

 	if (isset($_POST['nombre_colportor'])) {

 		$nombre_colportor = $_POST['nombre_colportor'];
 		$filesC = $insNF->datos_controlador_nueva_factura("colportor",$nombre_colportor);
 		$campos = $filesC->fetch();

		echo json_encode($campos);
 	}
 	 
 	if (!empty($_POST['codigo_colportor']) && !empty($_POST['encargado'])) {
 		
 		echo $insNF->agregar_controlador_nueva_factura();
 	}
 	if (isset($_GET['id'])) {
 		echo $insNF->eliminar_controlador_nueva_factura();
 	}

 	//TRAER DATOS DE PEDIDOS 
 	/*if ( isset($_POST['pedidos'])) {
 		$tabla = "";
 		$filesNF = $insNF->datos_controlador_nueva_factura("datos_pedidos",0);

 		$tabla.='<table class="table">
				<tr>
					<th class="text-center">CODIGO</th>
					<th class="text-center">CANT.</th>
					<th>DESCRIPCION</th>
					<th class="text-right">PRECIO UNIT.</th>
					<th class="text-right">PRECIO TOTAL</th>
					<th></th>
				</tr>';
					$sumador_total=0;
					while ($row=$filesNF->fetch())
					{
					$id_tmp=$row["id_tmp"];
					$codigo_producto=$row['codigoLibro'];
					$cantidad=$row['cantidad_tmp'];
					$nombre_producto=$row['nombreLibro'];


					$precio_venta=$row['precio_tmp'];
					$precio_venta_f=number_format($precio_venta,2);//Formateo variables
					$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
					$precio_total=$precio_venta_r*$cantidad;
					$precio_total_f=number_format($precio_total,2);//Precio total formateado
					$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
					$sumador_total+=$precio_total_r;//Sumador

						
					$tabla.='<tr>
						<td class="text-center">'. $codigo_producto.'</td>
						<td class="text-center">'. $cantidad.'</td>
						<td class="text-center">'. $nombre_producto.'</td>
						<td class="text-right">'. $precio_venta_f.'</td>
						<td class="text-right">'. $precio_total_f.'</td>
						<td class="text-center"><a class="btn btn-danger btn-sm" href="#" onclick="eliminar('.$id_tmp.')"><i class="glyphicon glyphicon-trash"></i></a></td>
					</tr>';
						
				}	
					
			$subtotal=number_format($sumador_total,2,'.','');
			$total_diezmo=($subtotal)/10;
			$total_diezmo=number_format($total_diezmo,2,'.','');
			$total_factura=$subtotal+$total_diezmo;

				
			$tabla.='<tr>
				<td class="text-right" colspan="4">SUBTOTAL $</td>
				<td class="text-right">'.number_format($subtotal,2).'</td>
				<td></td>
			</tr>
			<tr>
				<td class="text-right" colspan="4">Diezmo (10)  $</td>
				<td class="text-right"><span class="badge badge-danger"> '.number_format($total_diezmo,2).'</span></td>
				<td></td>
			</tr>
			<tr>
				<td class="text-right" colspan="4">TOTAL $</td>
				<td class="text-right"><span class="badge badge-success"> '.number_format($total_factura,2).'</span></td>
				<td></td>
			</tr>

			</table>';
 	
    echo $tabla;
 }*/
}
 ?>