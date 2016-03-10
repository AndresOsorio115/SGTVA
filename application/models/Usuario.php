<?php

Class Usuario extends CI_Model {


    var $nombre   = '';
    var $cedula = '';
    var $contrasenia    = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getUsuario(){

        $this->db->select('codigo,nombre,cedula,contrasenia');
        $this->db->from('usuarios');
    
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

    function verificarContra($codigo, $contrasenia) {

      $this -> db -> select('codigo, nombre, cedula, contrasenia');
      $this -> db -> from('usuarios');
      $this -> db -> where('codigo', $codigo);
      $this -> db -> where('contrasenia', $contrasenia);
      $this -> db -> limit(1);
 
      $query = $this -> db -> get();
     
      if($query -> num_rows() == 1) {

        return $query->result();

      } else {

         return false;
      }
    }

    function login($cedula, $contrasenia) {

      $this -> db -> select('codigo, nombre, cedula, contrasenia');
      $this -> db -> from('usuarios');
      $this -> db -> where('cedula', $cedula);
      $this -> db -> where('contrasenia', $contrasenia);
      $this -> db -> limit(1);
 
      $query = $this -> db -> get();
     
      if($query -> num_rows() == 1) {

        return $query->result();

      } else {

         return false;
      }
    }

    function insert($data) {

        if($this->db->insert('usuarios', $data)){

            return 1;
        }

        return 0;
    }

    function update($id,$data) {

        $this->db->where('codigo', $id);
        $this->db->update('usuarios', $data);

        if($this->db->affected_rows()==0) {

         return 0;
       }

       return 1;
    }

    function delete($data) {
        $this->db->delete('usuarios', array('codigo' => $data)); 

       if($this->db->affected_rows()==0) {

         return 0;
       }

       return 1;
    }

     function findById($id){

        $this->db->select('codigo,nombre,cedula,contrasenia');
        $this->db->from('usuarios');
        $this->db->where('codigo', $id);
    
        $query = $this->db->get();

        if($query->num_rows() == 1 )
        {
            return $query->result();
        }
        return 0;
    }
}
?>
