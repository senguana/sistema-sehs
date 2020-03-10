$(document).ready(function() {
	$(document).on('click', '.btnEditar', function() {
		var codigo = $(this).data('codigo');
		getDetails(codigo)
		$('#EditarLibro').modal('show')
	});

	function getDetails(codigo) {
		$.post('ajax/libroAjax.php',{codigo:codigo},function(r) {
			var datos = JSON.parse(r)
			$('#codigo_libro-up').val(datos.codigoLibro)
			$('#nombre_libro-up').val(datos.nombreLibro)
			$('#estado-up').val(datos.estadoLibro)
			$('#precio-up').val(datos.precioLibro)
			console.log(datos);
		})
		
	}
})