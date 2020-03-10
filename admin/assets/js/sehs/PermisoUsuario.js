$(document).ready(function() {
    var guardar_permisoUsuario = "Guardar permiso Usuario";
	var actualizar_permisoUsuario = "Actualizar permiso Usuario";
	var eliminar_campania = "Eliminar permiso Usuario";
	var estado_campania = "Actualizar estado de la Campaña";
	var select_campania = "Debes seleccionar la Campaña";
	var select_usuario = "Debes seleccionar el usuario";
	var select_provincia = "Debes seleccionar la Provincia";
	listarProvincia()
	listarProvincia1()
	listarProvincia2()
	listarActivoCampania()
	listarPersonaActivo()
	$('.guardar_permisoUsuario').submit(guardarPermisoUsuario) 
			
	function listarProvincia(){
			$.post('../controllers/ControladorPermisoUsuario.php?op=listarProvincia',  function(r){
			$('.ListaProvincia').html(r);
			
			
			});
	}
    function listarProvincia1(){
			$.post('../controllers/ControladorPermisoUsuario.php?op=listarProvincia1',  function(r){
			$('.ListaProvincia1').html(r);
			
			
			});
	}
	function listarProvincia2(){
			$.post('../controllers/ControladorPermisoUsuario.php?op=listarProvincia2',  function(r){
			$('.ListaProvincia2').html(r);
			
			
			});
	}

    $(document).on('click', '.btnAgregarCampania', function(){
		var id = $(this).data('id');
		getDetails(id);
		$('#btnAgregarCampania').modal('hide');
	});

	function getDetails(id){
		$.ajax({
			method: 'POST',
			url: '../controllers/ControladorCampania.php?op=getDetails',
			data: {id:id},
			dataType: 'json',
			success: function(r){
				$('#campania_id').val(r.id_campania)
				$('#name_campania').val(r.name_campania);
		
                ((r.estado=="1")? $('#estado1').val(r.estado)  :$('#estado0').val(r.estado));
				$('.id').val(r.id_campania)
				$('#txt_campania_id').val(r.id_campania)
				$('.fullname').html(r.name_campania)	
				console.log(r)
			}
		});
	}
    $(document).on('click', '.btnAgregarUsuario', function(){
		var id = $(this).data('id');
		getDetailsUsuario(id);
		$('#btnAgregarUsuario').modal('hide');
	});
	function getDetailsUsuario(id){
		$.ajax({
			method: 'POST',
			url: '../controllers/ControladorUsuario.php?op=getDetails',
			data: {id:id},
			dataType: 'json',
			success: function(r){
				$('#usuario_id').val(r.id_user);
				$('#nombre_usuario').val(r.surnames +' '+r.names)	
				console.log(r)
			}
		});
	}

	function guardarPermisoUsuario(e) {

		    
			let senData = {
				id_campania: $('#campania_id').val(),
				id_usuario: $('#usuario_id').val()
			}

			if (senData.id_campania == "") {
				mensaje(guardar_permisoUsuario, select_campania)
			}else if (senData.id_usuario=="") {
				 mensaje(guardar_permisoUsuario, select_usuario)
			}else if (!$("input[name='optionsProvincia']").is(':checked')) {
				mensaje(guardar_permisoUsuario, select_provincia)
			}else{
				$.post('../controllers/ControladorPermisoUsuario.php?op=guardar',$('.guardar_permisoUsuario').serialize(), function(r) {
					let datos = JSON.parse(r)
	    		  datos.forEach(res => {
	    		  	if (res.mensaje == 1) {
	    		  		mensaje(guardar_permisoUsuario, notify.guardar,  notify.success)
	    		        $('.guardar_permisoUsuario')[0].reset();
	    		  	}else{
	    		  		mensaje(guardar_permisoUsuario, notify.guardar,  notify.error)
	    		  	}
	    		  })
	    		  
	    		  
	    		  
	    	})
			}
	   e.preventDefault()
	}
})