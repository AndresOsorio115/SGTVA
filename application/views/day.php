
<h3>Registros del día <?php echo $fecha?></h3>

 <p><label for="vehiculo">Vehiculo:</label>
        <select  class="form-control" id="cmbVehiculos" placeholder="Vehiculo" name="vehiculo" required>
        <option value='0'>Vehiculos</option>
        <?php echo $html?>
</select></p>

<div class="tablaR">
		<table class="table table-hover" id="cuerpoTR">
					<thead>
						<tr>
							<th>Conductor</th>
							<th >Hora de Salida</th>
							<th>Hora  de Entrada</th>
							<th>Actividad</th>
							<th>Lugar de Origen</th>
							<th>Solicitante</th>
						</tr>	
					</thead>

					<tbody>
						
					</tbody>
		</table>
</div>
<hr>
<div>
<button type="button" class="btn btn-success" id="cConductor"> Crear </button> 
<button type="button" class="btn btn-success" id="eConductor"> Eliminar </button> 
<button type="button" class="btn btn-success" id="uConductor"> Editar </button>   
</div>