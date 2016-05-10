<?php 

if ( ! defined('BASEPATH')){
 exit('No direct script access allowed');
}

/**
 * Esta clase es la encargada de realizar el login del software,
 * funciona validando los campos de usuario y contrasenia,
 * estos datos fueron entregados al cliente previamente.
 */
class Login extends CI_Controller {

	/**
	 * Constructor de la clase
	 */
	 function __construct() {
	   parent::__construct();
	 }
	 
	 /**
	  * Metodo index que carga la vista del login
	  */
	 function index() {
	   
	   $this->load->helper(array('form'));
	   $this->load->view('login_view');
	 }
	
	/**
	 * Este es el metodo encargado de realizar las validaciones de usuario y contrasenia
	 * para realizar un login exitoso.
	 */
	 public function login(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
                $cedula = $_POST["cedula"];
				$contrasenia =  $_POST["contrasenia"];
				$pass = md5($contrasenia);

				$this->load->model("usuario");
				$result = $this->usuario->login($cedula, $pass);
				
				if($result) {

			       	$sess_array = array();
			       	foreach($result as $row) {
			       	
			         	$sess_array = array(
			           	'codigo' => $row->codigo,
			           	'nombre' => $row->nombre,
			           	'cedula' => $row->cedula
			         	);

			         	$this->session->set_userdata('logged_in', $sess_array);
			     	}

			     	echo "ok";
			     }
			     else
			     {
			     	echo "fail";
			     }
		}
	}
 
}
 
?>
