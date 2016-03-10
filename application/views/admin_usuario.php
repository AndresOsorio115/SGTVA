<head>
    <script src="application/js/adminUsuario.js"></script> 
</head>

<div class="uContainer">
	
	<div class="infoUsuario">

	<fieldset class="scheduler-border">
    <legend class="scheduler-border">Informacion del usuario</legend>
		
		    <label>* Nombre:</label>
		    <p><label class="sr-only" for="nombre">Nombre</label>
		    <input type="text" class="form-control" id="nombre" value="<?php echo $nombre ?>"/></p>
		    
		    <label>* Cedula:</label>		  
		    <p><label class="sr-only" for="cedula">Cedula</label>
		    <input type="text" class="form-control" id="cedula" value="<?php echo $cedula ?>"/></p>

		    <label>* Contraseña actual:</label>		  
		    <p><label class="sr-only" for="contrasenia">Contraseña actual</label>
		    <input type="password" class="form-control" id="contrasenia" placeholder="Para editar los datos debe digitar la contraseña"/></p>

		    <label>Nueva contraseña:</label>		  
		    <p><label class="sr-only" for="nuevaContra">Nuava contraseña</label>
		    <input type="password" class="form-control" id="nuevaContra" placeholder="Ingresar nueva contraseña" /></p>

		    <label>Confirmar contraseña:</label>		  
		    <p><label class="sr-only" for="confContra">Confirmar contraseña</label>
		    <input type="password" class="form-control" id="confContra" placeholder="Ingresar nueva contraseña" /></p>
		 
            <button type="button" class="btn btn-success" id="editarU"> Editar </button> 
            <input type="hidden" id="codigo" value="<?php echo $codigo ?>"/> </input>    

     </fieldset>

	</div>

</div>