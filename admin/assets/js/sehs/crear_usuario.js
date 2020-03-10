$(document).ready(function() {
  
  
  $(document).on('click', '.tablaColport', function() {
    info_colportor()
    $("#tablaColport").modal('show')
  })
  
  $(document).on('click', '.agregarColpor', function() {
    var codigo = $(this).data('codigo');
    var dni = $(this).data('dni');
    var nombre = $(this).data('nombre');
    var celular = $(this).data('celular');
    var email = $(this).data('email');
    $('#codigo_colportor1').val(codigo)
    $('#codigo_colportor').val(codigo)
    $('#nombres').val(nombre)
    $('#dni').val(dni)
    $('#celular').val(celular)
    $('#email').val(email)
    
  })

  });
  function info_colportor() {
    $.post('ajax/colportorAjax.php',{id:"id"}, function(r) {
      var data = JSON.parse(r)
      let tabla = "";
      for(let datos of data) {
        tabla+= `
          <tr">
            <td><span class="value text-success">${datos.ColportorCodigo}</span></td>
            <td>${datos.DNI}</td>
            <td>${datos.ColportorNombre +" "+ datos.ColportorApellido}</td>
            <td>${datos.ColportorCelular}</td>
            <td>${datos.ColportorEmail}</td>
            <td>
                <button 
                data-codigo="${datos.ColportorCodigo}" 
                data-dni="${datos.DNI}"
                data-nombre="${datos.ColportorNombre +" "+ datos.ColportorApellido}"
                data-celular="${datos.ColportorCelular}"
                data-email="${datos.ColportorEmail}" class="task-update btn btn-success btn-sm agregarColpor"><i class="fa fa-arrow-circle-down"></i></button>
            </td>
          </tr>
                `;
         console.log(datos)
      }
      $("#data").html(tabla)
    })
  }
