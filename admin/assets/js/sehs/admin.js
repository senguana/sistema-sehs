$(document).ready(function() {
	//actualizar
	$(document).on('click', '.btnEditarDatos', function(){
		var codigo = $(this).data('codigo');
		getDetailsAdmin(codigo)
		$('#ActualizarDatosAdmin').modal('show');
	});
    
	function getDetailsAdmin(id) {
		$.ajax({
			url: "http://localhost/pro-sehs/admin/ajax/administradorAjax.php",
			method: 'POST',
			data: {codigo:id},
			dataType: 'json',
			success: function(r) {
				$('#dni-up').val(r.AdminDNI)
				$('#nombre-up').val(r.AdminNombre)
				$('#apellido-up').val(r.AdminApellido)
				$('#telefono-up').val(r.AdminTelefono)
				$('#mision-up').val(r.id_mission)
				$('#direccion-up').val(r.AdminDireccion)
				$('#codigo-up').val(r.CuentaCodigo)
				
				console.log(r)
			}
		})
	}

	$(document).on('click', '.bnEditarCuenta', function(){
		var codigo = $(this).data('codigo');
		getDetailsCuenta(codigo)
		$('#ActualizarCuentaAdmin').modal('show');
	});
    
	function getDetailsCuenta(codigo) {
		$.ajax({
			url: "http://localhost/pro-sehs/admin/ajax/cuentaAjax.php",
			method: 'POST',
			data: {codigo:codigo},
			dataType: 'json',
			success: function(r) {
				$('#codigoCuenta-up').val(r.CuentaCodigo)
				$('#usuario-up').val(r.CuentaUsuario)
				$('#email-up').val(r.CuentaEmail)	
				$('#usuario-up').val(r.CuentaUsuario)
				$('#usuario-up').val(r.CuentaUsuario)
				$('#usuario-up').val(r.CuentaUsuario)
				
				console.log(r)
			}
		})
	}
})