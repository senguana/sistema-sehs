u INNER JOIN tb_person p ON u.person_id = p.id_person INNER JOIN tb_rol r ON r.id_rol = u.rol_id 
<td>${datos.province}</td>
				        <td>${datos.city}</td>
				        <td>${datos.mission}</td>
				        <td>${datos.date_add}</td>                             <th>Provincia</th>
                            <th>Ciudad</th>
                            <th>Misión</th>
                            <th>Fecha Add</th><td>${datos.address}</td>



                            $varListar = $objPersona->listar();
          $json = array(); 
          while ($result=$varListar->fetch(PDO::FETCH_OBJ)){
            $json[] = array(
                'id'=>$result->id_person,
                'dni'=> $result->dni,
                'names'=>$result->names,
                'surnames'=>$result->surnames,
                'sex'=>$result->sex,
                'address'=>$result->address,
                'cell'=>$result->cell,
                'email'=>$result->email,
                'country'=>$result->name_country,
                'province'=>$result->name_province,
                'city'=>$result->name_city,
                'mission'=>$result->name_mission,
                'date_add'=>$result->date_add,
                'status'=>$result->status
            );

          }
            $jsonstring = json_encode($json);
            echo $jsonstring;   



echo '<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
          <th>#</th>
          <th>Dni</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Genero</th>
          <th>Dirección</th>
          <th>Celular</th>
          <th>Email</th>
          <th>País</th>

          <th>Estado</th>
          <th style="width: 10%">Acción</th>
        </tr>
      </thead>
    <tbody>';
        $oper = 1;
        while ($result=$varListar->fetch(PDO::FETCH_OBJ)) {
            echo '<tr>
            <th>' . $oper . '</th>
            <td>' . $result->dni . '</td>
            <td>' . $result->names . '</td>
            <td>' . $result->surnames . '</td>
            <td>' . $result->sex . '</td>
            <td>' . $result->address . '</td>
            <td>' . $result->cell . '</td>
            <td>' . $result->email . '</td>
            <td>' . $result->name_country . '</td>
            <td>' . (($result->status==1) ? '<span class="badge bg-blue"><font style="vertical-align: inherit;">Activo</font></span>' : '<span class="badge bg-orange"><font style="vertical-align: inherit;">Desactivado</font></span>') 
              .
              '</td>
            <td>
               <div class="modal-footer">
                <button class="btn btn-success btn-xs" type="button" id="btnEditar" OnClick="editarCategoria(' . $result->id_person . ')"><i class="fa fa-edit" ></i> </button>
                <button class="btn btn-primary btn-xs" type="button" id="btnEliminar" OnClick="eliminarCategoria(' . $result->id_person . ')"><i class="fa fa-trash" ></i> </button>
                <button class="btn btn-danger btn-xs" type="button" id="btnEliminar" OnClick="eliminarCategoria(' . $result->id_person . ')"><i class="fa fa-eye" ></i> </button>
              </div>
            
            </td>
        </tr>';
            $oper++;
        }
        echo '</tbody</table>';




        js 
        $(document).ready(function() {
    listarPersona();
    function listarPersona(){
        $.ajax({
            url: '../controllers/ControladorPersona.php?op=listar',
            type: 'GET',
            success: function(r) {
                let datos = JSON.parse(r);
                let template = "";
                datos.forEach(dt =>{
                    template += `
                    <tr>
                        <td>${dt.dni}</td>
                        <td>${dt.names}</td>
                        <td>${dt.surnames}</td>
                        <td>${dt.sex}</td>
                        <td>${dt.address}</td>
                        <td>${dt.province}</td>
                        <td>${dt.province}</td>
                        <td>${dt.province}</td>
                        <td>${dt.province}</td>
                        <td>${dt.city}</td>
                        <td>${dt.mission}</td>
                        <td>${dt.date_add}</td>
                        <th>Fecha Add</th><td>${dt.address}</td>
                    </tr>    `;
                });
                $('#dataPersona').html(template);
            console.log(datos)
            }
        })
    }
}) //funciones cargadas al abrir el documento

      $("#selector-province").change(function() {

         $(".con-json select").empty();
         $.getJSON('getRegionesJson.php?pais='+$(".selector-pais select").val(),function(data){
             $.each(data, function(id,value){
         $(".con-json select").append('<option value="'+id+'">'+value+'</option>');
             });
         });
    });
  
    function recargarlistarPersona() {
        $.ajax({
            url: "../controllers/ControladorPersona.php?op=listar",
            type: "",
            data: ,
            success: function(r) {
                $('#selector-province').html(r)
            }
        })
    }  
<?php 
   session_start();
   if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status']!==1) {
      header("location: views/login.php");
        exit;
   }else {
       header("location: views/home_sehs.php ");
        exit;
   }
 ?>

            if ($guardarCuenta->rowCount()>=1) {
              $dataAD= [
                "DNI"=>$dni,
                "Nombre"=>$nombre,
                "Apellido"=>$apellido,
                "Telefono"=>$telefono,
                "Direccion"=>$direccion,
                "Mision"=>$mision,
                "Codigo"=>$codigo
              ];
              $guardarAdmin= ModeloAdministrador::agregar_administrador_modelo($dataAD);
              if ($guardarAdmin->rowCount()>=1) {
                $alerta= [
        "Alerta"=>"limpiar",
        "Titulo"=>"Administrador Registrado",
        "Texto"=>"El Administrador se registro exitosamente!",
        "Tipo"=>"success"];

                }else{
                  mainModel::eliminar_cuenta($codigo);
                  $alerta= [
        "Alerta"=>"simple",
        "Titulo"=>"Ocurrio un error inesperado",
        "Texto"=>"No se pudo registrar el Administrador jaja",
        "Tipo"=>"error"];
                }

            }else{
              $alerta= [
        "Alerta"=>"simple",
        "Titulo"=>"Ocurrio un error inesperado",
        "Texto"=>"No se pudo registrar el Administrador",
        "Tipo"=>"error"];

            }