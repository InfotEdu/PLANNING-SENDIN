<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartas extends CI_Controller {

	public function __construct(){
	   parent::__construct();
	 
		if(!$this->session->has_userdata('is_admin_login')){
			redirect('admin/auth/login');
		}
	}

	public function index(){
		$data['view'] = 'dataTable/cartas';
		$this->load->view('admin/layout', $data);
	}

	public function verqr(){
		$data['view'] = 'dataTable/verQr';
		$this->load->view('admin/layout', $data);
	}

}
