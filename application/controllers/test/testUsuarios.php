<?php
 
class TestLogin extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('usuario');
    }

    public function index() {

		$this->testInsert();
		$this->testVerificarContra();
		$this->testLogin();
		$this->testUpdate();
		$this->testDelete();
	}

	public function testInsert(){

		$codigo=1000;
		$nombre="prueba";
		$cedula="12345";
		$contrasenia="12345";

		$esperado=array('codigo'=>$codigo,'nombre'=>$nombre,'cedula'=>$cedula,'contrasenia'=>$contrasenia);
		$result = $this->usuario->insert($esperado);

		$query = $this->usuario->findById($codigo);

		$respuesta= $query[0];
		$result = array();
		
		$result['codigo'] = $respuesta->codigo;
    	$result['nombre']= $respuesta->nombre;
    	$result['cedula'] = $respuesta->cedula;
    	$result['contrasenia']=$respuesta ->contrasenia;

		echo $this->unit->run($result, $esperado, 'Insert user test');	
	}

	public function testUpdate(){

		$codigo=1000;
		$nombre="prueba";
		$cedula="12345";
		$contrasenia="54321";


		$esperado=array('codigo'=>$codigo,'nombre'=>$nombre,'cedula'=>$cedula,'contrasenia'=>$contrasenia);
		$result = $this->usuario->update($codigo, $esperado); 

		$query = $this->usuario->findById($codigo);

		$respuesta= $query[0];
		$result = array();
		
    	$result['codigo'] = $respuesta->codigo;
    	$result['nombre']= $respuesta->nombre;
    	$result['cedula'] = $respuesta->cedula;
    	$result['contrasenia']=$respuesta ->contrasenia;

		echo $this->unit->run($result, $esperado, 'Update user test');	
	}

	public function testDelete(){

		$codigo=1000;
		$esperado=1;
		$resultado = $this->usuario->delete($codigo);

		echo $this->unit->run($resultado, $esperado, 'Delete user test');	
	}

	public function testLogin(){

		$codigo=1000;
		$nombre="prueba";
		$cedula="12345";
		$contrasenia="12345";

		$esperado=array('codigo' => $codigo,'nombre'=>$nombre,'cedula'=>$cedula,'contrasenia'=>$contrasenia);
		$query = $this->usuario->login($cedula, $contrasenia);

		$sess_array = array();
       	foreach($query as $row) {
       	
         	$sess_array = array(
           	'codigo' => $row->codigo,
           	'nombre' => $row->nombre,
           	'cedula' => $row->cedula,
           	'contrasenia' => $row->contrasenia
         	);
        }

		echo $this->unit->run($sess_array, $esperado, 'Login test');	
	}

	public function testVerificarContra(){

		$codigo=1000;
		$nombre="prueba";
		$cedula="12345";
		$contrasenia="12345";

		$esperado=array('codigo' => $codigo,'nombre'=>$nombre,'cedula'=>$cedula,'contrasenia'=>$contrasenia);
		$query = $this->usuario->verificarContra($codigo, $contrasenia);

		$sess_array = array();
       	foreach($query as $row) {
       	
         	$sess_array = array(
           	'codigo' => $row->codigo,
           	'nombre' => $row->nombre,
           	'cedula' => $row->cedula,
           	'contrasenia' => $row->contrasenia
         	);
        }

		echo $this->unit->run($sess_array, $esperado, 'Verify user password test');	
	}
	 
}