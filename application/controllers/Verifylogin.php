<?php 
if ( ! defined('BASEPATH')){
  exit('No direct script access allowed');
} 
class VerifyLogin extends CI_Controller {
 
   function __construct() {
     parent::__construct();
     $this->load->model('usuario','',TRUE);
   }
   
   public function index() {
     //This method will have the credentials validation
     $this->load->library('form_validation');
     $this->form_validation->set_rules('cedula', 'Cedula', 'trim|required');
     $this->form_validation->set_rules('contrasenia', 'Contrasenia', 'trim|required');
   
     if(! $this->form_validation->run())
     {
       //Field validation failed.  User redirected to login page
       $this->load->view('login_view');
     }
     else
     {
       //Go to private area
       redirect('home', 'refresh');
     }
   
   }
   
   public function check_database($contrasenia) {
     //Field validation succeeded.  Validate against database
     $cedula = $this->input->post('cedula');
   
     //query the database
     $result = $this->usuario->login($cedula, $contrasenia);
   
     if($result)
     {
       $sess_array = array();
       foreach($result as $row)
       {
         $sess_array = array(
           'codigo' => $row->codigo,
           'nombre' => $row->nombre,
           'cedula' => $row->cedula
         );
         $this->session->set_userdata('logged_in', $sess_array);
       }
       return TRUE;
     }
     else
     {
       $this->form_validation->set_message('check_database', 'Invalid username or password');
       return false;
     }
   }
}
?>
