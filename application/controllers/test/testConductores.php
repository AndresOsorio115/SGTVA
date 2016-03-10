<?php
 
class TestConductores extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('conductor');
    }

  public function index()
	{
		$this->testInsert();
		$this->testUpdate();
		$this->testDelete();
	}

	public function testInsert(){

		$id=1000;
		$nombre="prueba2";
		$telefono="2";

		$esperado=array('codigo' => $id,'nombre'=>$nombre,'numTelefono' =>$telefono);
		$result = $this->conductor->insert($esperado);

		$query = $this->conductor->findById($id);

		$respuesta = $query[0];
		$result = array();
		
		$result['codigo'] = $respuesta->codigo;
    	$result['nombre']= $respuesta->nombre;
    	$result['numTelefono'] = $respuesta->numTelefono;
		echo $this->unit->run($result, $esperado, 'Insert Test');	
	}

	public function testUpdate(){

		$id=1000;
		$nombre="prueba4";
		$telefono="4";

		$esperado=array('nombre'=>$nombre,'numTelefono'=>$telefono);
		
		$result = $this->conductor->update($id,$esperado); 

		$query = $this->conductor->findById($id);

		$respuesta= $query[0];
		$result = array();
		
    	$result['nombre']= $respuesta->nombre;
    	$result['numTelefono'] = $respuesta->numTelefono;
		echo $this->unit->run($result, $esperado, 'Update Test');	
	}

	public function testDelete(){

		$id=1000;
		$esperado=1;
		$resultado= $this->conductor->delete($id);
		echo $this->unit->run($resultado, $esperado, 'Delete Test');	
	}
	 
}