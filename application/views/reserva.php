<head> 
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
    
    <script src="application/js/dia.js"></script>

</head>

<div class="cReserva">

	<fieldset class="contenedorReserva">
    <legend class="contenedorReserva">Reserva Vehiculo prueba <?php echo $fecha ?> </legend>
		
		<p><label for="cmbConductorV">Conductor:</label>
        <select  class="form-control" id="cmbConductorV">
	        <option value='0'>Conductor</option>
	        <?php echo $conductores ?>
		</select></p>

		<div class="cSolicitante">
	    	<fieldset class="contenedorSolicitate">
	    	<legend class="contenedorSolicitate">Solicitante</legend>

	    		<label>Depenencia:</label> <input type="text" class="form-control" id="solicitante"/>
				
				
				<br>

				<label>Unidades</label>
				<div id="unidades">
				<table id="tablaUnidades" class="table table-hover">    
					  <tbody>  
					     <?php echo $unidades ?>
					  </tbody>  
				</table>
			    </div>   
	    	 </fieldset>
		 </div>

		 <div class="cHoras"> 
			
			<fieldset class="contenedorSitio">
	    	<legend class="contenedorSitio">Sitio</legend>
			
	    		<label>Salida:</label> <input type="text" class="form-control" id="salida"/>
				
				<label id="destinol">Destino:</label> <input type="text" class="form-control" id="destino" />
			        
	    	 </fieldset>
			  

			<fieldset class="contenedorHora">
				

	    	<legend class="contenedorHora">Hora</legend>
				
				<div class="contenedorHoraS">
					
					  <label id="sH">Salida:</label>

					  <div class="form-group">
							<div class='input-group date' id='from'>
								<input type='text' name="from" class="form-control" readonly />
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
							</div>
					  </div>
        		</div>

				
				<div class="contenedorHoraL">
					
				     <label id="sL">Llegada:</label>

					 <div class="form-group">
						<div class='input-group date' id='to'>
							<input type='text' name="to" class="form-control" readonly />
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
						</div>
					 </div>
        		</div>
			      
	    	 </fieldset>

	    	 <script type="text/javascript">
				$(function () {
					$('#from').datetimepicker({
						language: 'es',
						defaultDate: new Date(),
						format: "YYYY-MM-D hh:mm:ss"
					});

					$('#to').datetimepicker({
						language: 'es',
						defaultDate: new Date(),
						format: "YYYY-MM-D hh:mm:ss"
					});
				});
			  </script>
    	</div>

		<div class="cActividad"> 
			<fieldset class="contenedorActividad">
	    	<legend class="contenedorActividad">Actividad</legend>
			
	    		<fieldset class="contenedorResponsable">
		    	<legend class="contenedorResponsable">Responsable</legend>
				
		    		<label>Nombre:</label> <input type="text" class="form-control" id="nombreR"/>
                                
                                <label>SegundoNombre:</label> <input type="text" class="form-control" id="nombreR"/>
				
					<label id="cedulal">Cedula:</label> <input type="text" class="form-control" id="cedulaR" />
				       
				        
		    	 </fieldset>
			        
		    	 <label id="lDescripcion" for="descripcion">Descripción:</label>
  				 <textarea class="form-control" rows="8" id="descripcion"></textarea>

			        
	    	 </fieldset>
    	</div>

    	<div id="contenedorBotones">
    	 <button type="button" class="btn btn-success" id="cRV"> Aceptar </button> 
 		</div>
     </fieldset>
     
     <input class="unidadE" id=""> </input>
     <input class="vehiculoE" id="<?php echo $vehiculo?>" ></input>
     <input class="fechaActual" id="<?php echo $fecha ?>"> </input>
</div>
