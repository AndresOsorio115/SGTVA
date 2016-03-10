<head>
    <script src="application/js/viajes.js"></script> 
</head>
<div class="divReportes">

	<fieldset class="contenedorReserva">
    <legend class="contenedorReserva">Reporte programa, facultad y dependencia</legend>
		
		<p><label for="mes">Mes:</label>
	        <select  class="form-control" id="cmbmes" placeholder="mes" name="mes"required>
	        <option value='0'></option>
	        <option value='1' id="enero">Enero</option>
	        <option value='2' id="febrero">Febrero</option>
	        <option value='3' id="Marzo">Marzo</option>
	        <option value='4' id="Abril">Abril</option>
	        <option value='5' id="Mayo">Mayo</option>
	        <option value='6' id="Junio">Junio</option>
	        <option value='7' id="Julio">Julio</option>
	        <option value='8' id="Agosto">Agosto</option>
	        <option value='9' id="Septiembre">Septiembre</option>
	        <option value='10' id="Octubre">Octubre</option>
	        <option value='11' id="Noviembre">Noviembre</option>
	        <option value='12' id="Diciembre">Diciembre</option>
		</select></p>
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

     <button type="button" class="btn btn-danger" id="pdf">Exportar a PDF</button>
</div>