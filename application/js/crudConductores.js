$(document).ready(function() {
     
     /**
      * Esta función se encarga realizar la creacion de los conductores
      * para realizar dicha accion se solicitan los valores de los campos correspondientes a los conductores.
      */
     $('#cConductor').click(function(event) {
       
        var nom = $('#nombre').val();
        var tel = $('#telefono').val();

        if(!nom!=null && tel!=null){

            $.ajax({
                url: "Home/cConductor",
                type: "POST",
                data:{
                        nombre: nom,
                        telefono: tel
                },
                success: function(respuesta){
                    
                    if(respuesta=="ok"){
                        alert("Se registro el conductor");
                        
                        $("#nombre").val('');
                        $("#telefono").val('');

                        $.ajax({
                            url: "home/conductores",
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
      * campos correspondientes a los conductores con la nueva informacion.
      */
    $('#uConductor').click(function(event) {
        
        var id= $('#idC').val();
        var nom = $('#nombre').val();
        var tel = $('#telefono').val();

        if(nom!=null && tel!=null && id!=null){

            $.ajax({
                url: "Home/uConductor",
                type: "POST",
                data:{
                        id:id,
                        nombre: nom,
                        telefono: tel
                },
                success: function(respuesta){
                    
                    if(respuesta=="ok"){
                        alert("Se actulizaron los datos del conductor");
                        $("#idV").val('');
                        $("#nombre").val('');
                        $("#telefono").val('');

                        $.ajax({
                            url: "Home/conductores",
                            type: "POST",
                            dataType: "html",
                            success: function(respuesta){
                    
                                $('.container').html(respuesta);
                                }
                        });
                    }else{
                        alert("No se pudo actualizar los datos del conductor");
                    }
                }
            });
        }else{
            alert("Debe ingresar los datos correctamente");
        }
    });

     /**
      * Este metodo es el usado para realizar la correcta
      * eliminacion de los conductores cuando sea requerido por la cliente.
      */
    $('#eConductor').click(function(event) {
       
        var id= $('#idC').val();
        if(id!=null){

            $.ajax({
                url: "Home/eConductor",
                type: "POST",
                data:{
                        id:id
                },
                error:function (argument) {
                  alert(argument.responseText.split("</p><p>")[1]);
                },
                success: function(respuesta){
                    
                    if(respuesta=="ok"){
                        
                        alert("El conductor ha sido Elminado");
                        $("#idC").val('');
                        $("#nombre").val('');
                        $("#telefono").val('');

                        $.ajax({
                            url: "home/conductores",
                            type: "POST",
                            dataType: "html",
                            success: function(respuesta){
                    
                                $('.container').html(respuesta);
                                }
                        });
                    }else{
                        alert("No se pudo eliminar los datos del conductor");
                    }
                    
                }
            });
        }else{
            alert("Debe seleccionar un conductor");
        }
    });

  $(".click").click(function(e) {
        var data = $(this).attr("id");

        var nom= $("#"+data+" .nom").html();
        var tel =$("#"+data+" .tel").html();

         
        $("#idC").val(data);
        $("#nombre").val(nom);
        $("#telefono").val(tel);
    });


});

