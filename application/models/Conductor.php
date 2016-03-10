<?php
class Conductor extends CI_Model {

    var $nombre  = '';
    var $numTelefono = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function delete($data){
        $this->db->delete('conductores', array('codigo' => $data)); 

        if($this->db->affected_rows()==0){
            return 0;
        }

        return 1;

    }

    function insert($data)
    {
        $this->db->insert('conductores', $data);
       
       if($this->db->affected_rows()==0) {
         return 0;
       }       
       return 1;;
    }

    function update($id,$data){
        $this->db->where('codigo', $id);
        $this->db->update('conductores', $data);
        if($this->db->affected_rows()==0) {
         return 0;
       }       
       return 1;
    }

    function getConductores(){

        $this->db->select('codigo,nombre,numTelefono');
        $this->db->from('conductores');
    
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

    function findById($id){

        $this->db->select('codigo,nombre,numTelefono');
        $this->db->from('conductores');
        $this->db->where('codigo', $id);
    
        $query = $this->db->get();
        if($query->num_rows() == 1 )
        {
            return $query->result();
        }
        return 0;
    }

    

}
