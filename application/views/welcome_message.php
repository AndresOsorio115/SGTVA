<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sistema de Gestión de Transporte.</title>
    <script type="text/javascript" src="/SGTVA/application/js/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="/SGTVA/application/js/javascript.js"></script>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #20912D;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		text-align: center;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	h1 img {

		height: 200px;
		width: 200px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	p input {

		font-size: 18px;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Sistema de Gestión de Transporte<br><br><img src="https://pbs.twimg.com/profile_images/2436226416/77iwm57o4cyovswjyxki_400x400.jpeg"></h1>
	

	<div class="login">

	<fieldset class="scheduler-border-login">
    	<legend class="scheduler-border">Login</legend>
			
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