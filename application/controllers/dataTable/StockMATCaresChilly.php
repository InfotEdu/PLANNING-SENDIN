<?php
	//defined('BASEPATH') OR exit('No direct script access allowed');
	header('Access-Control-Allow-Origin: *');

	class StockMATCaresChilly extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('dataTable/Historico_model');

			if(!$this->session->has_userdata('is_admin_login')){
				redirect('admin/auth/login');
			}


		}


		public function index(){
			if (isset($_GET["fecha"])) {
				$fecha = $_GET["fecha"];

			}else{
				$fecha = date("Y-m-d");
			}


			$tenemosHistorico = $this->Historico_model->dameHistoricoFecha($fecha);
			//$bobinasIdea = $this->Historico_model->dameBobinasIdea($fecha);
			//$data["bobinasIdea"] = $bobinasIdea;
			
			 
			 if ($tenemosHistorico == 0) {

			 	$data['view'] = 'dataTable/stock-mat-vacio';
			 	$this->load->view('admin/layout', $data);
			 }else{
				$data['view'] = 'dataTable/stock-mat-cares-chilly';
				$this->load->view('admin/layout', $data);
			}

			
		}

		public function GuardaBIdea(){
			/*$datos[0]=$_POST['unidades'];
			$datos[1]=$_POST['lugar'];*/

			//var_dump($_POST);
			$this->Historico_model->guardaBobinasIdea($_POST);

		}

		public function generarCopiaHistorico(){
			if (isset($_GET["fecha"])) {
				$fecha = $_GET["fecha"];

			}else{
				$fecha = date("Y-m-d");
			}


			$tenemosHistorico = $this->Historico_model->dameHistoricoFecha($fecha);

			if ($tenemosHistorico == 0) {
				$valor=$this->Historico_model->generarCopiaHistorico();
			}
			redirect('dataTable/StockMATCares');

			

			
		}
		
}


?>