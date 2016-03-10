<?php
class Actividad extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function insert($data)
    {
        if($this->db->insert('actividades', $data)){
            return 1;
        }
        return 0;
    }

    function getLastInsert(){

         $query = $this->db->query('SELECT MAX(codigo) AS id FROM actividades');
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

}
