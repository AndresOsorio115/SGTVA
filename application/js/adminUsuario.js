$(document).ready(function() {

    /**
     * Esta funcion es la encargada de editar los campos de los
     * usuarios a partir de las accines capturadas enel software a traves de los
     * clics presionados.
     */
    $('#editarU').click(function(event) {
        
        /**
         * Declaramos los campos que tendran los usuarios
         */
        var codigo= $('#codigo').val();
        var nombre = $('#nombre').val();
        var cedula = $('#cedula').val();
        var contrasenia = $('#contrasenia').val();
        var nuevaContra = $('#nuevaContra').val();
        var confContra = $('#confContra').val();

      /**
       * Realizamos las validaciones de los campos
       */
        if(nombre!="" && cedula!="" && contrasenia!="" && codigo!="") {

        	$.ajax({
	                url: "home/confirmarContra",
	                type: "POST",
	                data:{
	                        codigo:codigo,
	                        contrasenia:contrasenia
	                },
	                success: function(respuesta){
	                    
	                    if(respuesta=="fail"){

	                    	alert("Contraseña incorrecta");

	                    }else{
	                        
	                        if (confContra=="" && nuevaContra=="") {

	                        	$.ajax({
					                url: "home/editarUsuario",
					                type: "POST",
					                data:{
					                        codigo:codigo,
					                        nombre: nombre,
					                        cedula: cedula,
					                        contrasenia:contrasenia
					                },
					                success: function(respuesta){
					                    
					                    if(respuesta=="fail"){

					                    	alert("No se pudo actulizar los datos del usuario");

					                    }else{
					                        
					                        alert("Se actulizaron los datos del usuario");

					                        $('.container').html(respuesta);
					                    }
					                }
					            });

				        	} else {

				        		if (nuevaContra == confContra) {

					        		$.ajax({
					                url: "home/editarUsuario",
					                type: "POST",
					                data:{
					                        codigo:codigo,
					                        nombre: nombre,
					                        cedula: cedula,
					                        contrasenia:nuevaContra
					                },
					                success: function(respuesta){
					                    
					                    if(respuesta=="fail"){

					                    	alert("No se pudo actulizar los datos del usuario");

					                    }else{
					                        
					                        alert("Se actulizaron los datos del usuario");

					                        $('.container').html(respuesta);
					                    }
					                }
					            });

					        	} else {

					        		alert("No coinciden las contraseñas");
					        	}
				        	}
	                    }
	                }
	        });
        	
        	
            
        } else {
	/**
	 * Lanzamos alertas que notifiquen los problemas encontrados en el formulario.
	 */
            alert("Debe ingresar minimo los campos (Nombre, Cedula y Contraseña actual) para poder editar");
        }
    });

});
