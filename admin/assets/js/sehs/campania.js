$(document).ready(function() {
	//actualizar
	$(document).on('click', '.bnEditarCampania', function(){
		var codigo = $(this).data('codigo');
		getDetailsCampania(codigo)
		$('#EditarCampania').modal('show');
	});
    $(document).on('click', '.btnEditarEstado', function(){
		var codigo = $(this).data('codigo');
		getDetailsCampania(codigo)
		$('#btnEditarEstado').modal('show');
	});
    
	function getDetailsCampania(codigo) {
		$.ajax({
			url: "http://localhost/pro-sehs/admin/ajax/campaniaAjax.php",
			method: 'POST',
			data: {codigo:codigo},
			dataType: 'json',
			success: function(r) {
				$('#id_campania-up').val(r.Id)
				$('#codigo_campania-up').val(r.CampaniaCodigo)
				$('#codigo_campania').val(r.CampaniaCodigo)
				$('#nombre_campania-up').val(r.NombreCampania)
				$('#fecha_inicio-up').val(r.FechaInicioCampania)
				$('#fecha_fin-up').val(r.FechaFinCampania)
				r.EstadoCampania==1?$('#estado1').val(r.EstadoCampania):$('#estado0').val(r.EstadoCampania);
				
				console.log(r)
			}
		})
	}
}) //funciones cargadas al abrir el documento

		


