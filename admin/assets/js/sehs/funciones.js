

const notify = {
	guardar: '¡Se ha registrado Exitosamente!',
	actualizar: '¡Datos han sido actualizados correctamente!',
	eliminar: '¡Se ha eliminado Exitosamente!',
	estado: '¡Se ha actualizado el estado Exitosamente!',
	success: 'success',
	info: 'info',
	error: 'error',
	danger: 'danger'
}
function mensaje(nombre, opcion, type_success) {
	 new PNotify({
	      title: nombre,
	      text: opcion,
	      type: type_success,
	      styling: 'bootstrap3'
	  });
}

function listarActivoCampania(){
	$.ajax({
		url: '../controllers/ControladorCampania.php?op=listarActivo',
		type: 'GET',
		success: function(r) {
			let datos = JSON.parse(r);
			let template = "";
			datos.forEach(dt =>{
				template += `
				<tr>
				    <td>${dt.nombre_campania}</td>
				    <td>${dt.fech_inicio}</td>
				    <td>${dt.fech_fin}</td>
				    <td>
                        <button class="btn btn-success btn-sm btnAgregarCampania"  type="button" data-id="${dt.id}"><i class="fa fa-arrow-circle-o-down"></i> Agregar</button>
                    </td>   `;
			});
			$('#dataCampania').html(template);
			

		console.log(datos)
		}
	});
}

function listarPersonaActivo(){
		$.ajax({
			url: '../controllers/ControladorUsuario.php?op=listar',
			type: 'GET',
			success: function(r) {
				let datos = JSON.parse(r);
				let template = "";
				datos.forEach(dt =>{
					template += `
					<tr>
					    <td>${dt.dni}</td>
					    <td>${dt.names +' ' + dt.surnames}</td>
					    <td>${((dt.rol=='Administrador')?'<span class="badge bg-green"><font>Administrador</font></span>' :
					     '<span class="badge bg-orange"><font>Lider</font></span>')}</td>
					    <td>
                          <button class="btn btn-success btn-sm btnAgregarUsuario"  type="button" data-id="${dt.id}"><i class="fa fa-arrow-circle-o-down"></i> Agregar</button>  
                            
                            
                        </td>   `;
				});
				$('#dataUsuario').html(template);
				

			console.log(datos)
			}
		});
	}