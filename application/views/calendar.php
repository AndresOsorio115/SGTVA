<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SGTVA </title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="application/css/css.css">
    <link rel="stylesheet" href="bower_components/bootstrap-calendar/css/calendar.css">

    <script type="text/javascript" src="bower_components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="application/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="application/js/js.js"></script>
    
    <script src="application/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap-calendar/js/language/es-ES.js"></script>
</head>
<body>

    <header>
        <h1><img src="http://www.uniquindio.edu.co/info/uniquindio/media/bloque2778464"></h1>
    </header>   
    <div class="main">
        <div class="navegacion">
            <ul class="nav nav-pills nav-stacked">

                <li><a href="Home" id="inicio">Incio</a></li>
                <li><a href="#" id="conductores">Conductores</a></li>
                <li><a href="#" id="vehiculos">Vehiculos</a></li>
                <li><a href="#" id="reportes">Reportes</a></li>
                <li><a href="#" id="usuario">Usuario</a></li>
                <li><a href="home/logout">Cerrar sesión</a></li>
            </ul>
        </div>

        <div class="container">
            <h3 class="row">Registro de solicitud de vehiculo</h3>
            <div class="row">
                <div class="page-header">
                    <div class="pull-right form-inline">
                        <div class="btn-group">
                            <button class="btn btn-success" data-calendar-nav="prev"><< Anterior</button>
                            <button class="btn" data-calendar-nav="today">Hoy</button>
                            <button class="btn btn-success" data-calendar-nav="next">Siguiente >></button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-success" data-calendar-view="year">Año</button>
                            <button class="btn btn-success" data-calendar-view="month">Mes</button>
                            <button class="btn btn-success" data-calendar-view="week">Semana</button>
                            <button class="btn btn-success" data-calendar-view="day" id="dia">Día</button>
                        </div>
                    </div>
                    <h3 id="ui"></h3>
                </div>     
            </div>
            <div class="row">
                <div id="calendar"></div>
            </div>
        </div>

    </div>

    <script src="bower_components/underscore/underscore-min.js"></script>
    <script src="bower_components/bootstrap-calendar/js/calendar.js"></script>
    <script type="text/javascript">
    (function($){
        //creamos la fecha actual
        var date = new Date();
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
        var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
        //establecemos los valores del calendario
        var options = {
            events_source: 'events/getAll',
            view: 'month',
            language: 'es-ES',
            tmpl_path: 'bower_components/bootstrap-calendar/tmpls/',
            tmpl_cache: false,
            day: yyyy+"-"+mm+"-"+dd,
            time_start: '10:00',
            time_end: '20:00',
            time_split: '30',
            width: '100%',
            onAfterEventsLoad: function(events) 
            {
                if(!events) 
                {
                    return;
                }
                var list = $('#eventlist');
                list.html('');
                $.each(events, function(key, val) 
                {
                    $(document.createElement('li'))
                        .html('<a href="' + val.url + '">' + val.title + '</a>')
                        .appendTo(list);
                });
            },
            onAfterViewLoad: function(view) 
            {
                $('.page-header h3').text(this.getTitle());
                $('.btn-group button').removeClass('active');               
                $('button[data-calendar-view="' + view + '"]').addClass('active');
                
            },
            classes: {
                months: {
                    general: 'label'
                }
            }
        };
        var calendar = $('#calendar').calendar(options);
        $('.btn-group button[data-calendar-nav]').each(function() 
        {
            var $this = $(this);
            $this.click(function() 
            {
                calendar.navigate($this.data('calendar-nav'));
            });
        });
        $('.btn-group button[data-calendar-view]').each(function() 
        {

            var $this = $(this);
            $this.click(function() 
            {
               
                calendar.view($this.data('calendar-view'));
            });
        });

        $('#first_day').change(function()
        {
            var value = $(this).val();
            value = value.length ? parseInt(value) : null;
            calendar.setOptions({first_day: value});
            calendar.view();
        });
        $('#events-in-modal').change(function()
        {
            var val = $(this).is(':checked') ? $(this).val() : null;
            calendar.setOptions(
                {
                    modal: val,
                    modal_type:'iframe'
                }
            );
        });
    }(jQuery));
    </script>
</body>

<footer>
    
    <div>
        <p>Copyright &copy; 2015</p>
        <p>Julio Cesar Garcia Sabogal</p>
        <p>Fabio Stiven Oquendo Soler</p>
        <p>Cristian Daniel Palechor Sepulveda</p>
    </div>
    
</footer>
</html>