<?php
if ( ! defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Esta clase representa el controlador Home,
 * el cual jugara el rol principal en cuanto a las
 * funcionalidades de los controladores.
 */
class Home extends CI_Controller {

 	/**
 	 * Este es el metodo principal de la clase.
 	 */
 	function index() {
   		
   			
	     if($this->session->userdata('logged_in')) {

		     $session_data = $this->session->userdata('logged_in');
		     $data['nombre'] = $session_data['nombre'];
		     $this->load->view('calendar', $data);
		
		} else {
		     //If no session, redirect to login page
		     header("location: login");
			 exit();
		}
 	}
 	
 	/**
 	 * Este metodo cierra la sesion del usuario actual.
 	 */
	public function logout() {

	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   header("location: /");
	}
	   
 

//----------------------------------------------VEHICULOS---------------------------------------------//

	/**
	 * Este metodo se encarga de gestionar los vehiculos,
	 * Cargando el modelo y sobrecargando el html con los datos obtenidos.
	 */
	public function vehiculos(){

		$this->load->model("vehiculo");
		
		$result = $this->vehiculo->getVehiculos();
		$html='';

		if($result!=0){

			foreach ($result as $row) {
				$html.="<tr id=\"".$row->codigo."\" class=\"click\">";
				$html.="<th class=\"ref\">".$row->referencia."</th>";
				$html.="<th class=\"cm\">".$row->capacidadMax."</th>";
				$html.="<th class=\"pla\">".$row->placa."</th>";
				$html.='<th><i class="icon-edit"></i> Modificar</th>';
				$html.="</tr>";		
			}
		}

		$data['html']=$html;
		$response = $this->load->view('crud_Vehiculos',$data ,TRUE);

		echo $response;
	}

	/**
	 * Esta funcion carga los vehiculos obtenidos del modelo al html.
	 */
	public function vehiculosCmb(){

		$this->load->model("vehiculo");
		
		$result = $this->vehiculo->getVehiculos();
		$html='';

		if($result!=0){

			foreach ($result as $row) {
				$html.="<option value=\"".$row->codigo."\" >".$row->referencia."</option>";		
			}
		}
		echo $html;
	}
	
	/**
	 * Este emtodo realiza la consulta de los vehiculos,
	 * a partir de la placa en los modelos.
	 */
	public function cVehiculo(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
                $referencia = $_POST["referencia"];
				$placa =  $_POST["placa"];
				$cm =  $_POST["cm"];
				
				if ($referencia!= null && $placa != null && $cm != null) {
					
					$this->load->model("vehiculo");
					$result = $this->vehiculo->findByPlaca($placa);

					if($result==0){

						$data = array('referencia'=>$referencia,'placa'=>$placa,'capacidadMax'=>$cm);
						$result = $this->vehiculo->insert($data);
				
						if($result==1){
							echo "ok";
						}else{
							echo "fail";
						}
					}
					
				}
		}
	}

	/**
	 * Este metodo se encarga de hacer update en los campos de los vehiculos.
	 */
	public function uVehiculo(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/

				$id = $_POST["id"];
                $referencia = $_POST["referencia"];
				$placa =  $_POST["placa"];
				$cm =  $_POST["cm"];
				
				if ($referencia!= null && $placa != null && $cm != null&& $id!=null) {
					
					$this->load->model("vehiculo");
					$data = array('referencia'=>$referencia,'placa'=>$placa,'capacidadMax'=>$cm);
					$result = $this->vehiculo->update($id,$data);
					if($result==1){
						echo "ok";
					}else{
						echo "fail";
					}
				}
		}
	}

	/**
	 * Este metodo se encarga de eliminar los registros de los vehiculos.
	 */
	public function eVehiculo(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
				$id=$_POST["id"];
				
				if ($id!=null) {
					
					$this->load->model("vehiculo");
					$result = $this->vehiculo->delete($id);
					if($result==1){
						echo "ok";
					}else{
						echo "fail";
					}
				}
		}
	}

//----------------------------------------------CONDUCTORES---------------------------------------------//
	
	public function conductores(){

		$this->load->model("conductor");
		
		$result = $this->conductor->getConductores();
		$html='';

		if($result!=0){

			foreach ($result as $row) {
				$html.="<tr id=\"".$row->codigo."\" class=\"click\">";
				$html.="<th class=\"nom\">".$row->nombre."</th>";
				$html.="<th class=\"tel\">".$row->numTelefono."</th>";
				$html.='<th><i class="icon-edit"></i> Modificar</th>';
				$html.="</tr>";		
			}
		}

		$data['html']=$html;
		$response = $this->load->view('crud_conductor',$data ,TRUE);

		echo $response;
		
	}

	/**
	 * Este metodo se encarga de crear los conductores,
	 * cargando sus respectivos modelos.
	 */
	public function cConductor(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
                $nombre = $_POST["nombre"];
				$telefono =  $_POST["telefono"];
				
				if ($nombre!= null && $telefono != null) {

					$this->load->model("conductor");
					$data = array('nombre'=>$nombre,'numTelefono'=>$telefono);
					$result = $this->conductor->insert($data);
					if($result==1){
						echo "ok";
					}else{
						echo "fail";
					}
				}
		}

	}

	/**
	 * Metodo encargado de hacer update en los campos del conductor
	 */
	public function uConductor(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/

				$id = $_POST["id"];
                $nombre = $_POST["nombre"];
				$telefono =  $_POST["telefono"];
				
				if ($nombre!= null && $telefono != null && $id!=null) {
					
					$this->load->model("conductor");
					$data = array('nombre'=>$nombre,'numTelefono'=>$telefono);
					$result = $this->conductor->update($id,$data);
					
					if($result==1){
						echo "ok";
					}else{
						echo "fail";
					}
				}
		}
	}

	/**
	 * Este metodo es el encargado de eliminar los conductores,
	 * dado el id del conductor indicado.
	 */
	public function eConductor(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
				$id=$_POST["id"];
              
				
				if ($id!=null) {
					
					$this->load->model("conductor");
					$result = $this->conductor->delete($id);
					
					if($result==1){
						echo "ok";
					}else{
						echo "fail";
					}
				}
		}
	}

//----------------------------------------------USUARIO---------------------------------------------//
	
	/**
	 * Este metodo se encarga de relizar la creacion de los usuarios
	 */
	public function usuario(){


		$this->load->model("usuario");
		
		$result = $this->usuario->getUsuario();

		$codigo='';
		$nombre='';
		$cedula='';
		$contrasenia='';

		if($result!=0){

			foreach ($result as $row) {

				$codigo=$row->codigo;
				$nombre=$row->nombre;
				$cedula=$row->cedula;
				$contrasenia=$row->contrasenia;	
			}
		}

		$data['codigo']=$codigo;
		$data['nombre']=$nombre;
		$data['cedula']=$cedula;
		$data['contrasenia']=$contrasenia;

		$response = $this->load->view('admin_usuario',$data ,TRUE);

		echo $response;
	}

	/**
	 * Este metodo se encarga de aignar las contrasenias,
	 * relizando un cifrado md5 a dichas contrasenias.
	 */
	public function confirmarContra(){

		if($_POST) {	
		
			$codigo = $_POST["codigo"];
			$contrasenia =  $_POST["contrasenia"];
			$pass = md5($contrasenia);
			
			if ($pass != null && $codigo!=null) {
				
				$this->load->model("usuario");
				$result = $this->usuario->verificarContra($codigo,$pass);
				
				if ($result != false) {

					echo "ok";

				} else {

					echo "fail";
				}
		
			}
		}
	}

	/**
	 * Este metodo se encarga de editar y actualizar los datos del usuario.
	 */
	public function editarUsuario(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/

				$codigo = $_POST["codigo"];
                $nombre = $_POST["nombre"];
				$cedula =  $_POST["cedula"];
				$contrasenia =  $_POST["contrasenia"];
				
				if ($nombre!= null && $cedula != null && $contrasenia != null && $codigo!=null) {

					$pass = md5($contrasenia);
					
					$this->load->model("usuario");
					$data = array('nombre'=>$nombre,'cedula'=>$cedula,'contrasenia'=>$pass);
					$result = $this->usuario->update($codigo,$data);
					
					if ($result == 1) {

					$data['codigo']=$codigo;
					$data['nombre']=$nombre;
					$data['cedula']=$cedula;
					$data['contrasenia']=$contrasenia;
					
					$response = $this->load->view('admin_usuario',$data ,TRUE);

						echo $response;

					} else {

						echo "fail";
					}
					

				}
		}
	}
	
	/**
	 * Este metodo se encarga de generar las reservas del aplicativo,
	 * dado el conductor solicitante.
	 */
	public function reserva(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/

				$this->load->model("unidad");
		
				$result = $this->unidad->getUnidades();
				$unidades='';

				if($result!=0){

					foreach ($result as $row) {
						$unidades.="<tr id=\"".$row->codigo."\" class=\"click\">";
						$unidades.="<td class=\"ref\">".$row->nombre."</td>";
						$unidades.="</tr>";		
					}
				}


				$this->load->model("conductor");
		
				$result = $this->conductor->getConductores();
				$conductores='';

				if($result!=0){

					foreach ($result as $row) {
						$conductores.="<option value=\"".$row->codigo."\">".$row->nombre."</option>";		
					}
				}
				$data['unidades']=$unidades;
				$data['conductores']= $conductores;
				$fecha = $_POST["fecha"];
				$vehiculo = $_POST["vehiculo"];

				$data['fecha']=$fecha;
				$data['vehiculo'] = $vehiculo;	
				$response = $this->load->view('reserva',$data ,TRUE);

				echo $response;
		}
	}

	/**
	 * Este metodo se  encarga de agregar las reservas de los vehivulos,
	 * es necesario comprender que se necesita un conductor que realiza la reserva,
	 * un vehiculo a ser reservado, adicionalmente se debe conocer los datos complementrarios
	 * de la reserva.
	 */
	public function agregarReserva(){

		if($_POST) {

			  $unidad      = $_POST["unidad"];    
			  $vehiculo    = $_POST["vehiculo"];
			  $conductor   = $_POST["conductor"];

			  $solicitante = $_POST["solicitante"];

			  $cedulaR     = $_POST["cedulaR"];
			  $descripcion = $_POST["descripcion"];

			  $salida      = $_POST["salida"];
			  $destino     = $_POST["destino"];

			
			  $fechaActual = $_POST["fechaActual"];
			  
			  $responsable = $_POST["rname"];

			  $dateSalida= $_POST["from"];
			  
			  $dateLlegada= $_POST["to"];

			  $start = $_POST["from"];
			  $end =  $_POST["to"];

			  //validación !!! 

			   $this->load->model("registro");
			   $registros = $this->registro->getRegistrosDia($fechaActual);
			   $bandera=1;

			   if($registros!=0){
			   		foreach ($registros as $row) {
					
						if($vehiculo==$row->codigoVehiculo || $conductor==$row->codigoConductor){

							if($dateSalida>=$row->fechaSalida && $dateSalida<=$row->fechaLlegada){
								$bandera=0;
							}

							if($dateSalida<$row->fechaSalida && $dateSalida>$row->fechaLlegada){
								$bandera=0;
							}
							if($dateLlegada>=$row->fechaSalida && $dateLlegada<=$row->fechaLlegada){
								$bandera=0;
							}
							if($dateLlegada<$row->fechaSalida && $dateLlegada>$row->fechaLlegada){
								$bandera=0;
							}
						}
			        }
			   }
			   
			   if($bandera==1){

					  $this->load->model("solicitante");
					  $data = array('nombre'=>$solicitante);
					  $result = $this->solicitante->insert($data);


					  $this->load->model("actividad");
					  $data = array('nombreResponsable'=>$responsable,'cedulaResponsable'=>$cedulaR,'descripcion'=>$descripcion);
					  $result = $this->actividad->insert($data);


					  $this->load->model("viaje");
					  $data = array('fechaSalida'=>$dateSalida,'fechaLlegada'=>$dateLlegada, 'direccionOrigen'=>$salida, 'direccionDestino'=>$destino);
					  $result = $this->viaje->insert($data);
					

					  $query = $this->actividad->getLastInsert();
					  $respuesta= $query[0];
					  $idActividad= $respuesta->id;
				 
				 	  $query = $this->solicitante->getLastInsert();
					  $respuesta= $query[0];
					  $idSolicitante= $respuesta->id;

					  $query = $this->viaje->getLastInsert();
					  $respuesta= $query[0];
					  $idViaje= $respuesta->id;



					  $this->load->model("vehiculo");
					  $query = $this->vehiculo->findById($vehiculo);
					  $respuesta= $query[0];
					  $ref= $respuesta->referencia;
				      
				      $this->load->model("conductor");
					  $query = $this->conductor->findById($conductor);
					  $respuesta= $query[0];
					  $cond= $respuesta->nombre;

					  $this->load->model("registro");
					  $data = array('fechaSolicitud'=>$fechaActual,'codigoViaje'=> $idViaje,'codigoActividad'=>$idActividad,'codigoSolicitante'=>$idSolicitante,'codigoUnidad'=>$unidad,'codigoConductor'=>$conductor,'codigoVehiculo'=>$vehiculo );
					  $result = $this->registro->insert($data);


					  $title="Conductor: ".$cond."\n"."Vehiculo: ".$ref."\n"."Fecha Salida: ".$start."\n"."Fecha Llegada: ".$end ;
					 
					  $data = array('end'=>$end,'start'=>$start,'class'=>"event-important",'title'=>$title);
					  $this->load->model('event');
					  $this->event->insert($data);

			   		  echo "ok";
			   }else{

			   		  echo "fail";
			   }
		}
	}

	/**
	 * Este metodo esta programado para obtener las reservas que se
	 * han realizado en la aplicacion, con el fin de reportar 
	 * lo sucedido.
	 */
	public function getReservas(){

		if($_POST) {	

			$vehiculo = $_POST["vehiculo"];
			$fecha    = $_POST["fecha"];

			$this->load->model("registro");
		
			$result = $this->registro->getRegistros($fecha,$vehiculo);
			$html='';

			if($result!=0){

				foreach ($result as $row) {
					$html.="<tr id=\"".$row->codigo."\" class=\"click\">";
					$html.="<td class=\"ref\">".$row->nombre."</td>";
					$html.="<td class=\"fechaSalida\">".$row->fechaSalida."</td>";
					$html.="<td class=\"fechaLlegada\">".$row->fechaLlegada."</td>";
					$html.="<td class=\"descripcion\">".$row->descripcion."</td>";
					$html.="<td class=\"direccionO\">".$row->direccionOrigen."</td>";
					$html.="<td class=\"solicitante\">".$row->solicitante."</td>";
					$html.="</tr>";		
				}
			}
			
			echo $html;
		}
	}


	/**
	 * Este metodo se encarga de generar los reportes de
	 * uso de la aplicacion, es decir, reservas, conductores, etc.
	 */
	public function reportes(){

		//$this->load->model("conductor");
		$this->load->model("registro");

		$html='';
		$data['html']=$html;
		$response = $this->load->view('reportes_view',$data ,TRUE);

		echo $response;
	}

	/**
	 * Este metodo carga los reportes generados a partir de la informacion
	 * ingresada en  el software.
	 */
	public function getReportes(){

		//$this->load->model("conductor");


		if($_POST) {	
			        
			$fechaI = $_POST["fechaI"];
			$fechaF   = $_POST["fechaF"];
			$this->load->model("registro");
		
			$result = $this->registro->getReporte($fechaI,$fechaF);
			$html='';

			if($result!=0){

				foreach ($result as $row) {
						$html.="<tr>";
						$html.="<th>".$row->nombre."</th>";
						$html.="<th>".$row->placa."</th>";
					 	$html.="<th>".$row->lugar."</th>";
					 	$html.="<th>".$row->fecha."</th>";
						$html.="</tr>";		
				}
			}

			echo $html;
		}
	
	}

	/**
	 * Este metodo es el encargado de generar reportes en formato pdf,
	 * dado que esto fue solicitado por parte del cliente.
	 */
	public function pdf(){
		// As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/


		if($_POST) {	
			        
			$fechaI = $_POST["fechaI"];
			$fechaF   = $_POST["fechaF"];
			$mes = $_POST["mes"];
			$this->load->model("registro");
		
			$result = $this->registro->getReporte($fechaI,$fechaF);
			$html='';

			if($result!=0){

				foreach ($result as $row) {
						$html.="<tr>";
						$html.="<th class=\"tipo\">".$row->tipoUnidad."</th>";
						$html.="<th class=\"nom\">".$row->nombre."</th>";
					 	$html.="<th class=\"cant\">".$row->cantidad."</th>";
						$html.="</tr>";		
				}
			}

			$pdfFilePath = FCPATH."/reports/report.pdf";
			$data['html'] = $html; // pass data to the view
			$data['mes']= $mes;
			
			    ini_set('memory_limit','32M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="😉" draggable="false" class="emoji">
			    $html = $this->load->view('reports',$data ,TRUE); // render the view into HTML
			     
			    $this->load->library('pdf');
			    $pdf = $this->pdf->load();
			    $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="😉" draggable="false" class="emoji">
			    $pdf->WriteHTML($html); // write the HTML into the PDF
			    $pdf->Output($pdfFilePath, 'F'); // save to file because we can
			
			 redirect("http://localhost/SGTVA/reports/report.pdf"); 
		}

	}
}
