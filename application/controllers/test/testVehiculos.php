<?php
 
class TestVehiculos extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('vehiculo');
    }

  public function index()
	{
		$this->testInsert();
		$this->testUpdate();
		$this->testDelete();
	}

	public function testInsert(){

		$id=2;
		$referencia="prueba2";
		$placa="prueba2";
		$cm="4";

		$esperado=array('codigo' => $id,'referencia'=>$referencia,'placa'=>$placa,'capacidadMax'=>$cm);
		$result = $this->vehiculo->insert($esperado);

		$query = $this->vehiculo->findById($id);

		$respuesta= $query[0];
		$result = array();
		
		$result['codigo'] = $respuesta->codigo;
    	$result['referencia']= $respuesta->referencia;
    	$result['placa'] = $respuesta->placa;
    	$result['capacidadMax']=$respuesta ->capacidadMax;
		echo $this->unit->run($result, $esperado, 'Insert Test');	
	}

	public function testUpdate(){

		$id=2;
		$referencia="prueba4";
		$placa="prueba4";
		$cm="8";

		$esperado=array('referencia'=>$referencia,'placa'=>$placa,'capacidadMax'=>$cm);		
		$result = $this->vehiculo->update($id,$esperado); 

		$query = $this->vehiculo->findById($id);

		$respuesta= $query[0];
		$result = array();
		
    	$result['referencia']= $respuesta->referencia;
    	$result['placa'] = $respuesta->placa;
    	$result['capacidadMax']=$respuesta ->capacidadMax;
		echo $this->unit->run($result, $esperado, 'Update Test');	
	}

	public function testDelete(){

		$id=2;
		$esperado=1;
		$resultado= $this->vehiculo->delete($id);
		echo $this->unit->run($resultado, $esperado, 'Delete Test');	
	}
	 
}