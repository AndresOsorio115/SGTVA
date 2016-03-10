$(document).ready(function() {


    $('#editarU').click(function(event) {
        
        var codigo= $('#codigo').val();
        var nombre = $('#nombre').val();
        var cedula = $('#cedula').val();
        var contrasenia = $('#contrasenia').val();
        var nuevaContra = $('#nuevaContra').val();
        var confContra = $('#confContra').val();

      
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

            alert("Debe ingresar minimo los campos (Nombre, Cedula y Contraseña actual) para poder editar");
        }
    });

});