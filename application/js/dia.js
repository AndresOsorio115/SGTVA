$(document).ready(function() {

	 jQuery("#buscador").keyup(function(){
	    if( jQuery(this).val() != ""){
	        jQuery("#tablaUnidades tbody>tr").hide();
	        jQuery("#tablaUnidades td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
	    }
	    else{
	        jQuery("#tablaUnidades tbody>tr").show();
	    }
	});


	jQuery.extend(jQuery.expr[":"], 
	{
	    "contiene-palabra": function(elem, i, match, array) {
	        return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	    }
	});

	

	$(".click").click(function(e) {
        var data = $(this).attr("id");
        var nom= $("#"+data+" .ref").html();
        $(".unidadE").attr("id",data);
        $("#buscador").val(nom);
         jQuery("#tablaUnidades tbody>tr").hide();
	     jQuery("#tablaUnidades td:contiene-palabra('" + nom + "')").parent("tr").show();
    });



	$('#cRV').click(function(event) {
        
     	var unidad = $(".unidadE").attr("id");
        var vehiculo =$(".vehiculoE").attr("id");
        var solicitante = $("#solicitante").val();
        
        var responsable = $("#nombreR").val();

        var cedulaR =  $("#cedulaR").val();
        var descripcion =  $("#descripcion").val();
        var salida =  $("#salida").val();
        var destino =  $("#destino").val();

        var from = $('#from').data("date");

        var to = $('#to').data('date');
    
        var conductor = $("#cmbConductorV").val();
        var fechaActual =  $(".fechaActual").attr("id");

 		if(conductor==0){

 			alert("Debe seleccionar un conductor");
 		}else{

 			$.ajax({
                url: "home/agregarReserva",
                type: "POST",
                dataType: "html",
                data:{
                   
                  	 unidad: unidad,          
                     vehiculo: vehiculo,
                     solicitante: solicitante,
                     cedulaR: cedulaR,
                     descripcion: descripcion,
                     salida: salida,
                     destino: destino,
                     to: to,
                     from: from,
                     rname: responsable,
                     fechaActual: fechaActual,
                     conductor: conductor
			    },
                success: function(respuesta){
                    
                    if(respuesta=="ok"){

                    	alert("Se registro correctamente");
                    	location.href ="/SGTVA/home";
                    }else{
                    	alert("No se registro correctamente");
                    }

                   	
                }
        });

 		}
     	
    });

});