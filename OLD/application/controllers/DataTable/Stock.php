<?php
	//defined('BASEPATH') OR exit('No direct script access allowed');
	header('Access-Control-Allow-Origin: *');

	class Stock extends CI_Controller {

		public function __construct(){
			parent::__construct();



		}

		public function index(){
			$data['page_name'] ='dataTable/stock';
			$this->load->view('index',$data);
		}
		
}


?>