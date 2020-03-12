$(document).ready(function() {

	$('#datatable1').DataTable();
	$('.FormGestionarCampania').hide();
	$('.cargarForm').on('click', function() {
		cargarFormGestionarCampania("mostrar");
		mostrarTablaCampania("ocultar");

	})

	function cargarFormGestionarCampania(op) {
		if (op=="mostrar") {
			$('.FormGestionarCampania').show();
		}else if(op=="ocultar") {
			$('.FormGestionarCampania').hide();
		}
	}
	function mostrarTablaCampania(op) {
		if (op=="ocultar") {
			$('.TablaGestionarCampania').hide();
		}else if(op=="mostrar") {
			$('#TablaGestionarCampania').show();
		}
	}
   
			
    $(document).on('click', '.tablaUsuario', function(){
    	info_colportor_usuario() 
		$('#tablaUsuario').modal('show');
	});
	 $(document).on('click', '.agregarColpor', function() {
    var codigo = $(this).data('codigo');
    var nombre = $(this).data('nombre');
    $('#codigo_usuario').val(codigo)
    $('#nombre_usuario').val(nombre)
    
  });
	function info_colportor_usuario() {
    $.post('ajax/colportorAjax.php',{data_usuario:"data_usuario"}, function(r) {
      var data = JSON.parse(r)
      console.log(data)
      let tabla = "";
      var num = 1;
      for(let datos of data) {
        tabla+= `
          <tr">
            <td><span class="value text-success">${num}</span></td>
            <td>${datos.ColportorNombre +" "+ datos.ColportorApellido}</td>
            <td>${datos.CuentaUsuario}</td>
            <td>${((datos.CuentaTipo==2)?'<span class="badge bg-blue"><font>Lider</font></span>' :
					     '<span class="badge bg-orange"><font>Admin</font></span>')}</td>
            <td>
                <button 
                data-codigo="${datos.ColportorCodigo}" 
                data-nombre="${datos.ColportorNombre +" "+ datos.ColportorApellido}"
                data-celular="${datos.ColportorCelular}"
                data-email="${datos.ColportorEmail}" class="task-update btn btn-success btn-sm agregarColpor"><i class="fa fa-arrow-circle-down"></i></button>
            </td>
          </tr>
                `;
                num++;
         console.log(datos)
      }
      $("#data").html(tabla)
    })
  }
  
});
function datos_provincia() {
    $.post('ajax/funcionesAjax.php?op=listar_provincia',function(r) {
    	console.log(r)
      $("#loader").html(r)
    })
}

 
  function listarCiudad(e) {
    $.post('ajax/funcionesAjax.php?op=listarCiudad1', 'id_provincia='+e,  function(r){
    var data = JSON.parse(r) 
    $('#input').html('<input type="hidden" id="selector_ciudad" value="'+data.id_ciudad+'" name="optionsCiudad">')
    console.log(data)
    });
  }
  function mos(e) {
      listarCiudad(e)
  }