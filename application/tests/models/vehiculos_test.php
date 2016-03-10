<?php

class Vehiculo_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('vehiculo');
        $this->obj = $this->CI->vehiculo;
    }


    public function testInsert(){

        $id=2;
        $referencia="prueba2";
        $placa="prueba2";
        $cm="4";

        $esperado=array('codigo' => $id,'referencia'=>$referencia,'placa'=>$placa,'capacidadMax'=>$cm);
        $result = $this->obj->insert($esperado);

        $query = $this->obj->findById($id);

        $respuesta= $query[0];
        $result = array();
        
        $result['codigo'] = $respuesta->codigo;
        $result['referencia']= $respuesta->referencia;
        $result['placa'] = $respuesta->placa;
        $result['capacidadMax']=$respuesta ->capacidadMax;

        $this->assertEquals($esperado,$result);
    }

    public function testUpdate(){

        $id=2;
        $referencia="prueba4";
        $placa="prueba4";
        $cm="8";

        $esperado=array('referencia'=>$referencia,'placa'=>$placa,'capacidadMax'=>$cm);     
        $result = $this->obj->update($id,$esperado); 

        $query = $this->obj->findById($id);

        $respuesta= $query[0];
        $result = array();
        
        $result['referencia']= $respuesta->referencia;
        $result['placa'] = $respuesta->placa;
        $result['capacidadMax']=$respuesta ->capacidadMax;
        $this->assertEquals($esperado,$result);  
    }

    public function testDelete(){

        $id=2;
        $esperado=1;
        $resultado=$this->obj->delete($id);
        $this->assertEquals($esperado,$resultado);
    }

}