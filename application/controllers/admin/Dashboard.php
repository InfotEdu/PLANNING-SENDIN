<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();

		}

		public function index(){
			$this->load->model('dataTable/incidencias_model', 'incidencias_model');
			$data['numero_incidencias'] = $this->incidencias_model->totalIncidenciasPendientes();
			$this->load->model('dataTable/votaciones_model', 'votaciones_model');
			$data['numero_votaciones'] = $this->votaciones_model->totalVotacionesAbiertas();
			$this->load->model('dataTable/inmuebles_model', 'inmuebles_model');
			$data['numero_inmuebles'] = $this->inmuebles_model->totalInmuebles();

			$data['title'] = 'Panel resumen';
			$data['view'] = 'admin/dashboard/indexGestor';
			$this->load->view('admin/layout', $data);
		}

		public function indexdef(){
			$data['title'] = 'Dashboard 1';
			$data['view'] = 'admin/dashboard/index';
			$this->load->view('admin/layout', $data);
		}

		public function index2(){
			$data['title'] = 'Dashboard 2';
			$data['view'] = 'admin/dashboard/index2';
			$this->load->view('admin/layout', $data);
		}
	}

?>	