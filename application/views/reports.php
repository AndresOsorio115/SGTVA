<div class="divReportes">

	<fieldset class="contenedorReserva">
    <legend class="contenedorReserva">Reporte programa, facultad y dependencia</legend>
		
		<p><label for="mes">Mes: <?php echo $mes?></label></p>
	      
	      
    	<div id="divTabla">
			<table class="table table-hover" id="tablaReportes">
						<thead>
							<tr>
								<th>Tipo</th>
								<th>Nombre</th>
								<th>Cantidad</th>
							</tr>	
						</thead>

						<tbody>
							<?php echo $html?>
						</tbody>
			</table>
		</div>

     </fieldset>

</div>