$(document).ready(function(){

    
	$(document).on('click', '.btnEditar', function(){
		var codigo = $(this).data('codigo');
		getDetails(codigo);
		$('#btnEditar').modal('show');
	});

    $(document).on('click', '.btnEliminar', function(){
		var codigo = $(this).data('codigo');
		getDetails(codigo);
		$('#btnEliminar').modal('show');
	});

    $(document).on('click', '.verDetalle', function(){
		var codigo = $(this).data('codigo');
		viewDetails(codigo);
		$('#verDetalle').modal('show');
	});

	$('.id').click(function(){
		var id = $(this).val();
		$.ajax({
			method: 'POST', 
			url: 'ajax/colportorAjax.php',
			data: {codigo_delete:id},
			dataType: 'json',
			success: function(r){
				swal(
                	"Ocurrio un error",
                	"No se pudo cerrar la sesión",
                	"error"
                );
                $('.RespuestaAjax').html(r)
				$('#btnEliminar').modal('hide');
			}
		});
	});
	function getDetails(codigo){
		$.ajax({
			method: 'POST',
			url: 'ajax/colportorAjax.php',
			data: {codigo:codigo},
			dataType: 'json',
			success: function(r){
			
				$('.id').val(r.ColportorCodigo);
				$('#codigo-up').val(r.ColportorCodigo);
				$('#dni-up').val(r.DNI);
				$('#nombres-up').val(r.ColportorNombre);
				$('#apellidos-up').val(r.ColportorApellido);
				$('#direccion-up').val(r.ColportorDireccion);	
				$('#email-up').val(r.ColportorEmail);	
				$('#cell-up').val(r.ColportorCelular);	
				$('#seleccionar-pais-up').val(r.id_pais);
				
				$('#seleccionar-provincia-up').val(r.id_provincia);
				$('#mision-up').val(r.id_mision);
				$('.fullname').html(r.ColportorNombre +" " + r.ColportorApellido);
				//(r.ColportorEstado == "1" ) ? $('#editEstado1').val(r.status) : $('#editEstado0').val(r.status);
				
				console.log(r)
			}
		});
	}

	function viewDetails(codigo) {
		$.ajax({
			method: 'POST',
			url: 'ajax/colportorAjax.php',
			data: {codigo:codigo},
			dataType: 'json',
			success: function(r){
				$('#resultado1').html("<b>Datos personales:</b>"+
				  "<br><br><b>CODIGO:</b>"+r.ColportorCodigo+
                  "<br><b>Dni:</b>"+r.DNI +" </br> <b>Nombres:</b> "+r.ColportorNombre+
                  "<br><b>Apellidos:</b> "+r.ColportorApellido+"<br><b>Género:</b> "+r.ColportorGenero+"<br><b>Estado:</b> "+ `${((r.ColportorEstado==1)?'<span class="badge bg-blue"><font>Activo</font></span>' :
					     '<span class="badge bg-orange"><font>Desactivado</font></span>')}`);	

				$('#resultado2').html("<b>Ubicación:</b>"+
                  "<br><br><b>País:</b>"+r.NombrePais +" </br> <b>Provincia:</b> "+r.NombreProvincia+
                  "<br><b>Ciudad:</b> "+r.NombreCiudad+"<br><b>Misión:</b> "+r.NombreMision+"<br><b>Dirección:</b> "+r.ColportorDireccion);
		
				
				$('#resultado3').html("<b>Contacto:</b>"+
                  "<br><br><b>Teléfono:</b>"+r.ColportorCelular +" </br> <b>Email:</b> "+r.ColportorEmail);	
		
				$('#fullname').html(r.ColportorApellido +' '+r.ColportorNombre)	
				console.log(r)
			}
		});
	}
	
    
    $('#seleccionar-pais').change(function() {
    	var id_pais = $("#seleccionar-pais").val();
    	show_hide(id_pais, 1)
    	
    })
	$('#seleccionar-pais-up').change(function() {
    	var id_pais = $("#seleccionar-pais-up").val();
    	show_hide(id_pais, 1)
    	
    })
    function show_hide(op, valor) {
    	if(op==valor){
          $(".ocultar").show()
          listarProvincia()
    	}else{
          $(".ocultar").hide()
    	}
    }
	function listarProvincia() {
		$.post('ajax/funcionesAjax.php?op=listarProvincia', 'id_pais='+$('#seleccionar-pais').val(),  function(r){
		$('#seleccionar-provincia').html(r);
		console.log(r)
		});
	}
	 $('#seleccionar-provincia').change(function() {
    	listarCiudad()
    })
	function listarCiudad() {
		$.post('ajax/funcionesAjax.php?op=listarCiudad', 'id_provincia='+ $('#seleccionar-provincia').val(),  function(r){
		$('#seleccionar-ciudad').html(r);
		console.log(r)
		});
	}
    function listarProvincia1() {
		$.post('ajax/funcionesAjax.php?op=listarProvincia', 'id_pais='+ $('#seleccionar-pais-up').val(),  function(r){
		$('#seleccionar-provincia-up').html(r);
		console.log(r)
		});
	}
	 $('#seleccionar-provincia-up').change(function() {
    	listarCiudad2()
    })
	function listarCiudad2() {
		$.post('ajax/funcionesAjax.php?op=listarCiudad', 'id_provincia='+ $('#seleccionar-provincia-up').val(),  function(r){
		$('#seleccionar-ciudad-up').html(r);
		console.log(r)
		});
	}

});

		


