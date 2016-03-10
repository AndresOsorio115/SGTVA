<?php

class Usuario_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('usuario');
        $this->obj = $this->CI->usuario;
    }

    
    public function testInsert(){

        $codigo=1000;
        $nombre="prueba";
        $cedula="12345";
        $contrasenia="12345";

        $esperado=array('codigo'=>$codigo,'nombre'=>$nombre,'cedula'=>$cedula,'contrasenia'=>$contrasenia);
        $result = $this->obj->insert($esperado);

        $query = $this->obj->findById($codigo);

        $respuesta= $query[0];
        $result = array();
        
        $result['codigo'] = $respuesta->codigo;
        $result['nombre']= $respuesta->nombre;
        $result['cedula'] = $respuesta->cedula;
        $result['contrasenia']=$respuesta ->contrasenia;

        $this->assertEquals($esperado,$result);
    }

   

    public function testVerificarContra(){

        $codigo=1000;
        $nombre="prueba";
        $cedula="12345";
        $contrasenia="12345";

        $esperado=array('codigo' => $codigo,'nombre'=>$nombre,'cedula'=>$cedula,'contrasenia'=>$contrasenia);
        $query = $this->obj->verificarContra($codigo, $contrasenia);

        $sess_array = array();
        foreach($query as $row) {
        
            $sess_array = array(
            'codigo' => $row->codigo,
            'nombre' => $row->nombre,
            'cedula' => $row->cedula,
            'contrasenia' => $row->contrasenia
            );
        }

       $this->assertEquals($esperado,$sess_array);
    }
     
     
    public function testLogin(){

        $codigo=1000;
        $nombre="prueba";
        $cedula="12345";
        $contrasenia="12345";

        $esperado=array('codigo' => $codigo,'nombre'=>$nombre,'cedula'=>$cedula,'contrasenia'=>$contrasenia);
        $query = $this->obj->login($cedula, $contrasenia);

        $sess_array = array();
        foreach($query as $row) {
        
            $sess_array = array(
            'codigo' => $row->codigo,
            'nombre' => $row->nombre,
            'cedula' => $row->cedula,
            'contrasenia' => $row->contrasenia
            );
        }

        $this->assertEquals($esperado,$sess_array);    
    }

    

      public function testUpdate(){

        $codigo=1000;
        $nombre="prueba";
        $cedula="12345";
        $contrasenia="54321";


        $esperado=array('codigo'=>$codigo,'nombre'=>$nombre,'cedula'=>$cedula,'contrasenia'=>$contrasenia);
        $result = $this->obj->update($codigo, $esperado); 

        $query = $this->obj->findById($codigo);

        $respuesta= $query[0];
        $result = array();
        
        $result['codigo'] = $respuesta->codigo;
        $result['nombre']= $respuesta->nombre;
        $result['cedula'] = $respuesta->cedula;
        $result['contrasenia']=$respuesta ->contrasenia;

        $this->assertEquals($esperado,$result);
    }

    public function testDelete(){

        $codigo=1000;
        $esperado=1;
        $resultado = $this->obj->delete($codigo);

        $this->assertEquals($esperado,$resultado);  
    }
}