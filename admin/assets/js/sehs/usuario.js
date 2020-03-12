$(document).ready(function() {
  $('input[type=checkbox]').change(function(){
    if($('input[type="checkbox"]').is(':checked')){
       $(".accion").show()
    }else{
       $(".accion").hide()
    }
});
}) //funciones cargadas al abrir el documento

		


