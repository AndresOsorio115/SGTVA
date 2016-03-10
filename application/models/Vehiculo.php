<?php
class Vehiculo extends CI_Model {

    var $placa   = '';
    var $referencia = '';
    var $cantidadMax    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    
    function delete($data){
        $this->db->delete('vehiculos', array('codigo' => $data)); 

       if($this->db->affected_rows()==0) {
         return 0;
       }       
       return 1;
    }

    function insert($data)
    {
        $this->db->insert('vehiculos', $data);
        
        if($this->db->affected_rows()==0){
            return 0;
        }
        return 1;
    }

    function update($id,$data){
        $this->db->where('codigo', $id);
        $this->db->update('vehiculos', $data);
        if($this->db->affected_rows()==0) {
         return 0;
       }       
       return 1;
    }

    function findById($id){


        $this->db->select('codigo,referencia,placa,capacidadMax');
        $this->db->from('vehiculos');
        $this->db->where('codigo', $id);
    
        $query = $this->db->get();
        if($query->num_rows() == 1 )
        {
            return $query->result();
        }
        return 0;
    }

    function findByPlaca($placa){


        $this->db->select('codigo,referencia,placa,capacidadMax');
        $this->db->from('vehiculos');
        $this->db->where('placa', $placa);
    
        $query = $this->db->get();
        if($query->num_rows() == 1 )
        {
            return $query->result();
        }
        return 0;
    }

    function getVehiculos(){

        $this->db->select('codigo,referencia,placa,capacidadMax');
        $this->db->from('vehiculos');
    
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

}
