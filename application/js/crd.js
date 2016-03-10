$(document).ready(function() {


     $('#cVehiculo').click(function(event) {

       
        var ref = $('#referencia').val();
        var placa = $('#placa').val();
        var cm = $('#cm').val();

        if(!isNaN(cm) && placa!=null && cm!=null){

            $.ajax({
                url: "home/cVehiculo",
                type: "POST",
                data:{
                        referencia: ref,
                        placa: placa,
                        cm:cm
                },
                success: function(respuesta){
                    
                    if(respuesta=="ok"){
                        alert("Se registro el vehiculo");
                        
                        $("#referencia").val('');
                        $("#placa").val('');
                        $("#cm").val('');

                        $.ajax({
                            url: "home/vehiculos",
                            type: "POST",
                            dataType: "html",
                            success: function(respuesta){
                    
                                $('.container').html(respuesta);
                            }
                        });
                    }
                }
            });
        }else{
            alert("Debe ingresar los datos correctamente");
        }
    });


    $('#uVehiculo').click(function(event) {
        
        var id= $('#idV').val();
        var ref = $('#referencia').val();
        var placa = $('#placa').val();
        var cm = $('#cm').val();

        if(!isNaN(cm) && placa!=null && cm!=null && id!=null){

            $.ajax({
                url: "home/uVehiculo",
                type: "POST",
                data:{
                        id:id,
                        referencia: ref,
                        placa: placa,
                        cm:cm
                },
                success: function(respuesta){
                    
                    if(respuesta=="ok"){
                        alert("Se actulizaron los datos del vehiculo");
                        $("#idV").val('');
                        $("#referencia").val('');
                        $("#placa").val('');
                        $("#cm").val('');

                        $.ajax({
                            url: "home/vehiculos",
                            type: "POST",
                            dataType: "html",
                            success: function(respuesta){
                    
                                $('.container').html(respuesta);
                                }
                        });
                    }else{
                        alert("No se pudo actulizar los datos del vehiculo");
                    }
                }
            });
        }else{
            alert("Debe ingresar los datos correctamente");
        }
    });

    $('#eVehiculo').click(function(event) {
       
        var id= $('#idV').val();
        
        if(id!=null){

            $.ajax({
                url: "home/eVehiculo",
                type: "POST",
                data:{
                        id:id
                },
                success: function(respuesta){
                    
                    if(respuesta=="ok"){
                        
                        alert("El vehiculo ha sido Elminado");
                        $("#idV").val('');
                        $("#referencia").val('');
                        $("#placa").val('');
                        $("#cm").val('');

                        $.ajax({
                            url: "home/vehiculos",
                            type: "POST",
                            dataType: "html",
                            success: function(respuesta){
                    
                                $('.container').html(respuesta);
                                }
                        });
                    }else{
                        alert("No se pudo elimiar el vehiculo");
                    }
                    
                }
            });
        }else{
            alert("Debe seleccionar un vehiculo");
        }
    });

    $(".click").click(function(e) {
        var data = $(this).attr("id");

        var ref= $("#"+data+" .ref").html();
        var cm =$("#"+data+" .cm").html();
        var pla = $("#"+data+" .pla").html();

         
        $("#idV").val(data);
        $("#referencia").val(ref);
        $("#placa").val(pla);
        $("#cm").val(cm);   
    });


});

