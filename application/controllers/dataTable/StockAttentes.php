<?php
	//defined('BASEPATH') OR exit('No direct script access allowed');
	header('Access-Control-Allow-Origin: *');

	class StockAttentes extends CI_Controller {

		public function __construct(){
			parent::__construct();

			if(!$this->session->has_userdata('is_admin_login')){
				redirect('admin/auth/login');
			}


		}


		public function index(){
			$data['view'] = 'dataTable/stock-attentes';
			$this->load->view('admin/layout', $data);
		}
		
}


?>