$(document).ready(function() {

    $('#ok').click(function(event) {
        var from = $('#from').data("date");

        var to = $('#to').data('date');

        alert(to+" " + from);
        /**
         * Realizamos la peticion ajax para hacer save de los eventos
         */
        $.ajax({
                    url: "events/save",
                    type: "POST",
                    data:{
                        to:to,
                        from:from
                    },
                    success: function(respuesta){
                        alert("ok");
                    }
         });
    });


});

