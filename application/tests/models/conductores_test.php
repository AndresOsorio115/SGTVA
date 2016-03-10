<?php

class Conductor_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('conductor');
        $this->obj = $this->CI->conductor;
    }

    public function testInsert(){

        $id=1000;
        $nombre="prueba2";
        $telefono="2";

        $esperado=array('codigo' => $id,'nombre'=>$nombre,'numTelefono' =>$telefono);
        $result = $this->obj->insert($esperado);

        $query =  $this->obj->findById($id);

        $respuesta = $query[0];
        $result = array();
        
        $result['codigo'] = $respuesta->codigo;
        $result['nombre']= $respuesta->nombre;
        $result['numTelefono'] = $respuesta->numTelefono;
        $this->assertEquals($esperado,$result);
    }

    public function testUpdate(){

        $id=1000;
        $nombre="prueba4";
        $telefono="4";

        $esperado=array('nombre'=>$nombre,'numTelefono'=>$telefono);
        
        $result = $this->obj->update($id,$esperado); 

        $query = $this->obj->findById($id);

        $respuesta= $query[0];
        $result = array();
        
        $result['nombre']= $respuesta->nombre;
        $result['numTelefono'] = $respuesta->numTelefono;
        $this->assertEquals($esperado,$result);  
    }

    public function testDelete(){

        $id=1000;
        $esperado=1;
        $resultado= $this->obj->delete($id);
        $this->assertEquals($esperado,$resultado);  
    }

}