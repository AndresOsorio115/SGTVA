<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Esta clase representa los eventos que pueden ser capturados,
* para despues ser tratados en los modelos a travez de peticiones ajax.
*/
class Events extends CI_Controller {
		
		public function index()
		{
			$this->load->view("add_event");
		}

		/**
		 * Este metodo se encarga de guardar los eventos dados sus respectivos modelos.
		 */
		public function save()
		{
			if($_POST) {	

				
			    $to = $_POST["to"];
				$from =  $_POST["from"];
				
				$data = array('end'=>$to,'start'=>$from,'class'=>"event-important");
				$this->load->model('event');
				$this->event->insert($data);
				echo "ok";
			}
		}

		/**
		 * Este metodo obtiene todos los posibles eventos capturados.
		 */
		public function getAll()
		{
				if($this->input->is_ajax_request())
				{
					$this->load->model('event');
					$events = $this->event->getAll();
					echo json_encode(
						array(
						"success" => 1,
						"result" => $events
						)
					);
				}
		}

		public function render($id = 0)
		{
			if($id != 0)
			{
				echo $id;
			}
		}
}





