<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Event extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("America/Bogota");
	}

	/**
	* @desc - añade un nuevo evento
	* @access public
	* @author Iparra
	* @return bool
	*/
	public function insert($data){
	
		$data["end"]= $this->_formatDate($data["end"]);
		$data["start"]= $this->_formatDate($data["start"]);

		if($this->db->insert('events', $data)){

            return 1;
        }

        return 0;
	}


	/**
	* @desc - obtiene todos los registros de events
	* @access public
	* @author Iparra
	* @return object
	*/
	public function getAll()
	{
		$query = $this->db->get('events');
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		
		return object();
	}

	/**
	* @desc - formatea una fecha a microtime para añadir al evento tipo 1401517498985
	* @access private
	* @author Iparra
	* @return strtotime
	*/
	private function _formatDate($date)
	{
		return strtotime($date)*1000 + 1000;
	}
}