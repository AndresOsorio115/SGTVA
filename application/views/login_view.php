<!DOCTYPE html>
<html>
<head>

	<title>Sistema de Gestión de Transporte de la Universidad del Quindío</title>

	<link rel="stylesheet" type="text/css" href="/application/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/application/css/login.css">
    <script type="text/javascript" src="/application/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="/application/js/login.js"></script>

</head>
<body>

	<div id="container">
	<h1>Sistema de Gestión de Transporte<br><br><img src="https://lh6.googleusercontent.com/-ap89qb_eFmY/AAAAAAAAAAI/AAAAAAAAABo/Qw7axggSsPU/s0-c-k-no-ns/photo.jpg"></h1>
	

	<div class="login">

	<fieldset class="scheduler-border-login">
    	<legend class="scheduler-border"><h2>Login</h2></legend>
			
		    <p><label for="cedula">Cedula:</label>
		    <input type="text" id="cedula" name="cedula"/></p>
		    <p><label for="contrasenia">Contraseña:</label>
		    <input type="password" id="contrasenia" name="contrasenia"/></p>
		    <p><input type="submit" id="btnLogin" value="Login"/></p>
		</form>      

     </fieldset>

	</div>


	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>