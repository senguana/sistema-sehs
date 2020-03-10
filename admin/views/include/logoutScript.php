<script>
	$(document).ready(function() {
		$('.btn-exit-system').on('click', function(e){
		e.preventDefault();

		var Token = $(this).attr('href');
		swal({
		  	title: 'Are you sure?',
		  	text: "The current session will be closed",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-run"></i> Yes, Exit!',
		  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancel!'
		}).then(function () {
			$.ajax({
				url: '<?php echo SERVERURL; ?>admin/ajax/LoginAjax.php?Token='+Token,
				success: function(r){
					console.log(r)
					if (r=="true") {
                        window.location.href="<?php echo SERVERURL; ?>admin/login"
					}else{
                       swal(
                        	"Ocurrio un error",
                        	"No se pudo cerrar la sesión",
                        	"error"
                        );
					}
				}


			})
		});
	});
	})
	
</script>