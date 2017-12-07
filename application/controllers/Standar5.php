<?php
	class Standar5 extends CI_Controller {


		function __construct(){
			parent::__construct();
		}

		function index(){

		}


		function kurikulum(){

			$data = array();
			$data['content'] = "pages/standar5/kurikulum";
			$this->load->view('dashboard',$data);

		}

	}