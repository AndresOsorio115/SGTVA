$(document).ready(function() {

    $('#cmbmes').on('change', function() {
       
        var mes =$('#cmbmes').val();
        var fechaI = new Date();
        var ano = fechaI.getFullYear();
        
        var fechaF= new Date();
        var mesF = parseInt(mes)+1;

        if(mes<10){
        	fechaI = ano+"-0"+mes+"-01";
        }else{
        	fechaI = ano+"-"+mes+"-01";
        }

        if(mesF<10){
        	fechaF = ano+"-0"+mesF+"-01";
        }else{
        	fechaF = ano+"-"+mesF+"-01";
        }

        $.ajax({
                url: "home/getReportes",
                type: "POST",
                dataType: "html",
                data:{
                    fechaI:fechaI,
                    fechaF:fechaF
                },
                success: function(respuesta){
                    
                   $('#tablaReportes tbody').html(respuesta);
                }
        });
    });

    $('#pdf').click(function(event) {
        

        var mes =$('#cmbmes').val();
        var fechaI = new Date();
        var ano = fechaI.getFullYear();
        
        var fechaF= new Date();
        var mesF = parseInt(mes)+1;
        var mesS= $( "#cmbmes option:selected" ).text();
        if(mes<10){
            fechaI = ano+"-0"+mes+"-01";
        }else{
            fechaI = ano+"-"+mes+"-01";
        }

        if(mesF<10){
            fechaF = ano+"-0"+mesF+"-01";
        }else{
            fechaF = ano+"-"+mesF+"-01";
        }

        $.ajax({
                url: "home/pdf",
                type: "POST",
                dataType: "html",
                data:{
                    fechaI:fechaI,
                    fechaF:fechaF,
                    mes:mesS
                },
                success: function(respuesta){
                    location.href ="http://localhost/SGTVA/reports/report.pdf";
                }
        });
    });
});