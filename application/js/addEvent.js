$(document).ready(function() {

    $('#ok').click(function(event) {
        var from = $('#from').data("date");

        var to = $('#to').data('date');

        alert(to+" " + from);
        
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

