<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {
		
		public function index()
		{
			$this->load->view("add_event");
		}

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





