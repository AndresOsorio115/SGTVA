<?php
class Unidad extends CI_Model {

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function getUnidades(){

       
        $this->db->select('codigo,nombre,tipoUnidad');
        $this->db->from('unidades');
    
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

}
