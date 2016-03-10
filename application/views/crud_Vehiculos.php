<head>
    <script src="application/js/crd.js"></script> 
</head>

 
<div class="vContainer">

	<fieldset class="scheduler-border">
    <legend class="scheduler-border">Vehiculos</legend>

	<div class="dtabla">
		<fieldset class="scheduler-border">
    	<legend class="scheduler-border">Lista de vehiculo</legend>
		<table class="table table-hover" id="cuerpoT">
					<thead>
						<tr>
							<th>Referencia</th>
							<th>Capacidad Máxima</th>
							<th>Placa</th>
						</tr>	
					</thead>

					<tbody>
						<?php echo $html ?>
					</tbody>
		</table>
		</fieldset>
	</div>


	<div class="crudv">
	<fieldset class="scheduler-border">
    <legend class="scheduler-border">Detalle Vehiculo</legend>
		
		    <label>Referencia:</label>
		    <p><label class="sr-only" for="referencia">Referencia</label>
		    <input type="text" class="form-control" id="referencia" placeholder="Referencia"></p>
		    
		    <label>Placa:</label>
		  
		    <p><label class="sr-only" for="placa">Placa</label>
		    <input type="text" class="form-control" id="placa" placeholder="Placa"></p>

		    <label>Capacidad Máxima:</label>

		     <p><label class="sr-only" for="cm">Capacidad Máxima</label>
		    <input type="text" class="form-control" id="cm" placeholder="Capacidad Máxima"></p>
             <button type="button" class="btn btn-success" id="cVehiculo"> Crear </button> 
             <button type="button" class="btn btn-success" id="eVehiculo"> Eliminar </button> 
             <button type="button" class="btn btn-success" id="uVehiculo">Editar</button>   
             <input type="hidden" id="idV"> </input>        
     </fieldset>

	</div>

</fieldset>
</div>

