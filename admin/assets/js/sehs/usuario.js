$(document).ready(function() {
	 listarPersonaActivo()
	 listarPersonaInactivo()
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
					    <td>${dt.usuario}</td>
					    <td>${((dt.rol=='Administrador')?'<span class="badge bg-green"><font>Administrador</font></span>' :
					     '<span class="badge bg-orange"><font>Lider</font></span>')}</td>
					    <td>${((dt.estado==1)?'<span class="badge bg-blue"><font>Activo</font></span>' :
					     '<span class="badge badge-danger"><font>Inactivo</font></span>')}</td>
					    <td>
                            <button class="btn btn-success btn-sm btnEditar"  type="button" data-id="${dt.id}"><i class="fa fa-edit" ></i> </button>
                            <button type="button" class="btn btn-danger btn-sm btnEliminar" data-id="${dt.id}"><i class="fa fa-plus"></i> </button>
                            
                        </td>   `;
				});
				$('#dataUsuario').html(template);
				

			console.log(datos)
			}
		});
	}
	function listarPersonaInactivo(){
		$.ajax({
			url: '../controllers/ControladorUsuario.php?op=listar1',
			type: 'GET',
			success: function(r) {
				let datos = JSON.parse(r);
				let template = "";
				datos.forEach(dt =>{
					template += `
					<tr>
					    <td>${dt.dni}</td>
					    <td>${dt.names +' ' + dt.surnames }</td>
					    <td>${dt.usuario}</td>
					    <td>${((dt.rol=='Administrador')?'<span class="badge bg-green"><font>Administrador</font></span>' :
					     '<span class="badge bg-orange"><font>Lider</font></span>')}</td>
					    <td>${((dt.estado==0)?'<span class="badge badge-danger"><font>Inactivo</font></span>' :
					     '')}</td>
					    <td>

                                <button class="btn btn-success btn-sm btnEditarEstado"  type="button" data-id="${dt.id}"><i class="fa fa-edit" ></i> </button>
                                <button type="button" class="btn btn-danger btn-sm btnEliminar" data-id="${dt.id}"><i class="fa fa-trash"></i> </button>
                            
                        </td>   `;
				});
				
				$('#dataUsuario1').html(template);

			console.log(datos)
			}
		});
	}

	// keyup para buscar persona  y crear usuario		
	 $("#buscar_persona").keyup(function(){
	 	let search = $('#buscar_persona').val();
	    if (search) {
	    	$.ajax({
	        url: '../controllers/ControladorUsuario.php?op=buscar_persona',
			type: 'POST',
			data: {search},
	        success:function(data){

        	let persona = JSON.parse(data)
        	persona.forEach( dats =>{
	          console.log(dats)
              if (dats.error) {
              	$('#error').show()
              	$('#error').html('<span class="value text-danger">'+dats.error+'</span>')
              }else{
		      var countriesArray = $.map(dats, function(value, key) {
				  return {
					value: value,
					data: key
				  };
				});

				// initialize autocomplete with custom appendTo
				$('#buscar_persona').autocomplete({
				  lookup: countriesArray
				});
               $('#error').hide()
			   $('#id_persona').val(dats.id)
			}
	       });
	        	
	           
	    }
	    });
	    }
	});
	 // keyup para actualizar persona  y usuario		
	 $("#edt_buscar_persona").keyup(function(){
	 	let search = $('#edt_buscar_persona').val();
	    if (search) {
	    	$.ajax({
	        url: '../controllers/ControladorUsuario.php?op=buscar_persona',
			type: 'POST',
			data: {search},
	        success:function(data){

        	let persona = JSON.parse(data)
        	persona.forEach( dats =>{
	          console.log(dats)

		      var countriesArray = $.map(dats, function(value, key) {
				  return {
					value: value,
					data: key
				  };
				});

				// initialize autocomplete with custom appendTo
				$('#edt_buscar_persona').autocomplete({
				  lookup: countriesArray
				});

			   $('#id_person').val(dats.id)
			
	       });
	        	
	           
	    }
	    });
	    }
	});
	$("#usuario").keyup(function(){
		$('.mensaje').html('')
		const sendData = {
			usuario: $('#usuario').val(),
			
		};
		if ($('#usuario').val()) {
			$.post('../controllers/ControladorUsuario.php?op=buscar_usuario',sendData, function(r) {
        		$('.mensaje').html(r)
        	
        })
		}
        
    });	

    $('#guardar_usuario').submit(function(e) {
    	
    	if ($('#buscar_persona').val() =='') {
    		$('#mensaje').html("<div class='alert alert-danger alert-dismissible' role='alert'>"+
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>"+
                    "<strong>¡Debes agregar a la persona, buscando por DNI o nombre!</strong>.</div>")
    	}else{
    	   $.post('../controllers/ControladorUsuario.php?op=guardar',$('#guardar_usuario').serialize(), function(r) {
    		  $('#mensaje').html(r)
    	})
        }
    	e.preventDefault()
    })

    $(document).on('click', '.btnEditar', function(){
		var id = $(this).data('id');
		getDetails(id);
		$('#btnEditar').modal('show');
	});

	$('#actualizar_usuario').submit(function(e) {
		e.preventDefault();
		$.post('../controllers/ControladorUsuario.php?op=guardar', $('#actualizar_usuario').serialize(), function(r) {
			$('#mensaje1').html(r)
			
	        $('#actualizar_usuario')[0].reset();
	        console.log(r);
			listarPersonaActivo()
	        listarPersonaInactivo()
	        $('#btnEditar').modal('hide')
		});
	});
    $(document).on('click', '.btnEditarEstado', function(){
    	var id = $(this).data('id');
		getDetails(id);
		$('#btnEditarEstado').modal('show');
    });
    
	$('#actualizar_estado').submit(function(e){
		$.post('../controllers/ControladorUsuario.php?op=actualizar_estado', $('#actualizar_estado').serialize(), function(r) {
			
			console.log(r);
			listarPersonaActivo()
	        listarPersonaInactivo()
	        $('#actualizar_estado').trigger('reset');
	        $('#btnEditarEstado').modal('hide');
		});
		e.preventDefault();
	});
	$(document).on('click', '.btnEliminar', function(){
		var id = $(this).data('id');
		getDetails(id);
		$('#btnEliminar').modal('show');
	});

	$('.id').click(function(){
		var id = $(this).val();
		$.ajax({
			method: 'POST', 
			url: '../controllers/ControladorPersona.php?op=eliminar',
			data: {id:id},
			dataType: 'json',
			success: function(r){
				$("#alert_message").html(r)
				$('#btnEliminar').modal('hide');
			}
		});
	});
	function getDetails(id){
		$.ajax({
			method: 'POST',
			url: '../controllers/ControladorUsuario.php?op=getDetails',
			data: {id:id},
			dataType: 'json',
			success: function(r){
				$('#txt_persona_id').val(r.id_user)
				$('.id').val(r.id_user);
				$('#id_usuario').val(r.id_user);
				$('#id_person').val(r.person_id);
				$('#edt_buscar_persona').val(r.names);
				$('#edt_usuario').val(r.username);
				$('#rol').val(r.id_rol);
				$('#estado').val(r.estado);
				$('.fullname').html(r.surnames +' '+r.names)	
				console.log(r)
			}
		});
	}
}) //funciones cargadas al abrir el documento

		


