<head>
    <script src="application/js/crudConductores.js"></script> 
</head>


<div class="vContainer">

	<fieldset class="scheduler-border">
    <legend class="scheduler-border">Conductores</legend>

	<div class="dtabla">
		<fieldset class="scheduler-border">
    	<legend class="scheduler-border">Lista de conductores</legend>
		<table class="table table-hover" id="cuerpoT">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Telefono</th>
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
    <legend class="scheduler-border">Detalle Conductor</legend>
		
		    <label>Nombre:</label>
		    <p><label class="sr-only" for="nombre">Nombre</label>
		    <input type="text" class="form-control" id="nombre" placeholder="Nombre"></p>
		    
		    <label>Telefono:</label>
		  
		    <p><label class="sr-only" for="telefono">Telefono</label>
		    <input type="text" class="form-control" id="telefono" placeholder="Telefono"></p>

		 
             <button type="button" class="btn btn-success" id="cConductor"> Crear </button> 
             <button type="button" class="btn btn-success" id="eConductor"> Eliminar </button> 
             <button type="button" class="btn btn-success" id="uConductor"> Editar </button>   
             <input type="hidden" id="idC"> </input>    

     </fieldset>

	</div>

</fieldset>
</div>
