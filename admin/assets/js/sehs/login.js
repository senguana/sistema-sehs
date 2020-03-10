
	$('#login_user').submit(function(e){
	  var username = $('#username').val();
		var password = $('#password').val();
		const sendData = {
			username: username,
			password: password
		}

		if (username.length == ""){
			$('#message').html('<div class="alert alert-danger">'+
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                  '<strong>Complete campo usuario</strong>'+
                  '</div>');
			$(".alert-danger").delay(500).show(10, function() {
                    $(this).delay(4000).hide(10, function() {
                      $(this).remove();
                    });
                  }); // /.alert
			return false;
		}
		if (password.length == ""){
			$('#message').html('<div class="alert alert-danger">'+
                  '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                  '<strong>Complete campo password</strong>'+
                  '</div>');
			$(".alert-danger").delay(500).show(10, function() {
                    $(this).delay(4000).hide(10, function() {
                      $(this).remove();
                    });
                  }); // /.alert
			return false;
		}

		if (username && password) {
			$.ajax({
			  type: "POST",
			  url: "../controllers/ControladorIniciarSession.php",
			  data: sendData,
			  dataType: 'json',
			  success: function(response){
			    console.log(response)
			    if (response.messages==0) {
			    	$('#message').html(`
					   <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Usuario y/o contraseña no coinciden.</strong>
                  </div>
					`);
			    }else if (response.messages==2) {
			    	$('#message').html(`
					   <div class="alert alert-secondary">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Oh!<i  class="fa fa-frown-o"></i>Tu cuenta se encuentra inactivo, para iniciar Sesión por favor contactése con el administrador.</strong>
                  </div>
					`);
			    }else if (response.messages==1) {
			    	var url = "home_sehs.php";
                    $(location).attr('href',url);
			    }
			  
			}
			});
		 }
		e.preventDefault();
	});
	
