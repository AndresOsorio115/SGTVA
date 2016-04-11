
$(document).ready(function() {

    $('#vehiculos').click(function(event) {
    	
        $.ajax({
                url: "Home/vehiculos",
                type: "POST",
                dataType: "html",
                success: function(respuesta){
                	
                   $('.container').html(respuesta);
                }
        });
    });

    $('#conductores').click(function(event) {
        
        $.ajax({
                url: "Home/conductores",
                type: "POST",
                dataType: "html",
                success: function(respuesta){
                    
                   $('.container').html(respuesta);
                }
        });
    });

     $('#reportes').click(function(event) {
        
        $.ajax({
                url: "Home/reportes",
                type: "POST",
                dataType: "html",
                success: function(respuesta){
                    
                   $('.container').html(respuesta);
                }
        });
    });

    $('#usuario').click(function(event) {
        
        $.ajax({
                url: "Home/usuario",
                type: "POST",
                dataType: "html",
                success: function(respuesta){
                    
                   $('.container').html(respuesta);
                }
        });
    });       


    $('#cR').click(function(event) {
        
        var fecha = $('.dA').attr("id");
        var vehiculo= $( "#cmbVehiculos" ).val();
    

        if(vehiculo==0){
            alert("Debe seleccionar un vehiculo");
        }else{

            $.ajax({
                    url: "Home/reserva",
                    type: "POST",
                    dataType: "html",
                    data:{
                        fecha:fecha,
                        vehiculo:vehiculo
                    },
                    success: function(respuesta){
                         $('.container').html(respuesta);
                    }
             });
        }
        
    });

    $('#cmbVehiculos').on('change', function() {
       
        var vehiculo =$('#cmbVehiculos').val();
        var fecha = $('.dA').attr("id");

        $.ajax({
                url: "Home/getReservas",
                type: "POST",
                dataType: "html",
                data:{
                    fecha:fecha,
                    vehiculo:vehiculo
                },
                success: function(respuesta){
                    
                   $('#cuerpoTR tbody').html(respuesta);
                }
        });
    });
    

});
