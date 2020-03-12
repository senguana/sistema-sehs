$(document).ready(function() {

	$('#FormGestionarCliente').hide();
	$('.FormGestionarCampania').hide();
	$('.cargarForm').on('click', function() {
		cargarFormGestionarC("mostrar");
		mostrarTablaCampania("ocultar");

	})

	function cargarFormGestionarC(op) {
		if (op=="mostrar") {
			$('#FormGestionarCliente').show();
		}else if(op=="ocultar") {
			$('#FormGestionarCliente').hide();
		}
	}
	function mostrarTablaC(op) {
		if (op=="ocultar") {
			$('#Form_cliente').hide();
		}else if(op=="mostrar") {
			$('#Form_cliente').show();
		}
	}
 });