$(document).ready(function() {

     /**
      * Esta función se encarga realizar la creacion de los vehiculos
      * para realizar dicha accion se solicitan los valores de los campos correspondientes a los vehiculos.
      */
     $('#cVehiculo').click(function(event) {

       
        var ref = $('#referencia').val();
        var placa = $('#placa').val();
        var cm = $('#cm').val();

        if(!isNaN(cm) && placa!=null && cm!=null){

            $.ajax({
                url: "Home/cVehiculo",
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
                            url: "Home/vehiculos",
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

     /**
      * Esta funcion es la encargada de realizar la actualizacion de los
      * campos correspondientes a los vehiculos con la nueva informacion.
      */
    $('#uVehiculo').click(function(event) {
        
        var id= $('#idV').val();
        var ref = $('#referencia').val();
        var placa = $('#placa').val();
        var cm = $('#cm').val();

        if(!isNaN(cm) && placa!=null && cm!=null && id!=null){

            $.ajax({
                url: "Home/uVehiculo",
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
                            url: "Home/vehiculos",
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

     /**
      * Este metodo es el usado para realizar la correcta
      * eliminacion de los vehiculos cuando sea requerido por la cliente.
      */
    $('#eVehiculo').click(function(event) {
       
        var id= $('#idV').val();
        
        if(id!=null){

            $.ajax({
                url: "Home/eVehiculo",
                type: "POST",
                data:{
                        id:id
                },
                error:function (argument) {
                  alert(argument.responseText.split("</p><p>")[1]);
                },
                success: function(respuesta){
                    
                    if(respuesta=="ok"){
                        
                        alert("El vehiculo ha sido Elminado");
                        $("#idV").val('');
                        $("#referencia").val('');
                        $("#placa").val('');
                        $("#cm").val('');

                        $.ajax({
                            url: "Home/vehiculos",
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

     /**
      * Esta funcion realiza los enlaces de los campos con los valores correspondientes.
      */
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

