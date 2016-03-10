<?php
class Registro extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function insert($data)
    {
        if($this->db->insert('registros', $data)){
            return 1;
        }
        return 0;
    }


    function  getRegistros($fecha,$vehiculo){

        $query = $this->db->query("SELECT c.nombre, v.fechaSalida, v.fechaLlegada, a.descripcion, v.direccionOrigen, s.nombre as solicitante ,r.codigo
                                   FROM  registros r JOIN conductores c on r.codigoConductor=c.codigo
                                   JOIN  viajes v on r.codigoViaje= v.codigo
                                   JOIN  actividades a on r.codigoActividad= a.codigo
                                   JOIN  solicitantes s on r.codigoSolicitante = s.codigo
                                   WHERE r.codigoVehiculo =$vehiculo and r.fechaSolicitud= '$fecha' ");
        
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }
    function getLastInsert(){

        $this->db->query('SELECT MAX(codigo) AS id FROM viajes');

        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

    
    function getReporte($fechaInicio,$fechaFin){

         $query= $this->db->query("SELECT u.tipoUnidad, u.nombre, COUNT(r.codigo) as cantidad
                                    FROM registros r JOIN unidades u 
                                    ON r.codigoUnidad = u.codigo
                                    WHERE r.fechaSolicitud BETWEEN '$fechaInicio' AND '$fechaFin'
                                    GROUP BY u.nombre
                                    ORDER BY COUNT(r.codigo) DESC");

        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

    function getRegistrosDia($fecha){
     
        $query= $this->db->query("SELECT r.codigoVehiculo, r.codigoConductor,v.fechaLlegada,v.fechaSalida
                                  FROM registros r JOIN viajes v 
                                  on r.codigoViaje= v.codigo
                                  WHERE r.fechaSolicitud='$fecha' ");

        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }
}
