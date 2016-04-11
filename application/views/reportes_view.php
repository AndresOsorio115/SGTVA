<head>
    <script src="application/js/viajes.js"></script> 
</head>
<div class="divReportes">

	<fieldset class="contenedorReserva">
    <legend class="contenedorReserva">Informe</legend>
		
    	<div id="divTabla">
			<table class="table table-hover" id="tablaReportes">
						<thead>
							<tr>
								<th>Nombre del Conductor</th>
								<th>Vehiculo</th>
								<th>lugar</th>
								<th>Fecha</th>
							</tr>	
						</thead>

						<tbody>
							<?php echo $html?>
						</tbody>
			</table>
		</div>

     </fieldset>

     <button type="button" class="btn btn-danger" id="pdf">Exportar a PDF</button>
</div>