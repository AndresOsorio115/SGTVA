$(document).ready(function() {

     $('#btnLogin').click(function(event) {
       
        var cedula = $('#cedula').val();
        var contrasenia = $('#contrasenia').val();

        if(cedula!=null && contrasenia!=null){

            $.ajax({
                url: "login/login",
                type: "POST",
                data:{
                        cedula: cedula,
                        contrasenia: contrasenia
                },
                success: function(respuesta){

                    if (respuesta == "fail") {

                        alert("Datos invalidos");

                    } else  {

                        $.ajax({
                            
                            url: "home",
                            type: "POST",
                            dataType: "html",
                            success: function(respuesta){

                                location.href = '/SGTVA/home';
                            }
                        });
                    }
                      
                }
            });

        } else {

            alert("Debe ingresar los datos correctamente");
        }
    });

});