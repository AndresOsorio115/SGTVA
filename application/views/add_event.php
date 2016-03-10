
<head>
	<title>Crear un nuevo evento</title>
	<meta charset="utf-8">

	<script src="bower_components/jquery/jquery.min.js"></script>
	<script src="bower_components/moment/moment.js"></script>
	<script src="bower_components/eonasdan-bootstrap-datetimepicker/bootstrap/bootstrap.min.js"></script>
	<script src="bower_components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
	<script src="bower_components/eonasdan-bootstrap-datetimepicker/src/js/locales/bootstrap-datetimepicker.es.js"></script>

	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="application/css/css.css">
	<script src="application/js/addEvent.js"></script>
	<link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
</head>


<div id="addEvent">

	<div class="form-group">
		<div class='input-group date' id='from'>
			<input type='text' name="from" class="form-control" readonly />
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		</div>
	</div>


	<div class="form-group">

		<div class='input-group date' id='to'>
			<input type='text' name="to" class="form-control" readonly />
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		</div>
	</div>


	<label>Nombre:</label>
	<p><label class="sr-only" for="nombre">Nombre</label>
	<input type="text" class="form-control" id="nombre" placeholder="Nombre"></p>
		    
	<label>Telefono:</label>
	<p><label class="sr-only" for="telefono">Telefono</label>
	<input type="text" class="form-control" id="telefono" placeholder="Telefono"></p>

	<button class="btn btn-warning" id="ok">ok</button>
	
	<script type="text/javascript">
		$(function () {
			$('#from').datetimepicker({
				language: 'es',
				defaultDate: new Date(),
				format: "YYYY-MM-D hh:mm:ss"
			});

			$('#to').datetimepicker({
				language: 'es',
				defaultDate: new Date()
				format: "YYYY-MM-D hh:mm:ss"
			});
		});
	</script>
</div>

