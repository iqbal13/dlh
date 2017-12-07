<?php
	class Standar7 extends CI_Controller {


		function __construct(){
			parent::__construct();
		}

		function index(){

		}


		function reguler(){

			$data = array();
			$data['content'] = "pages/standar3/reguler";
			$this->load->view('dashboard',$data);

		}

		function reguler_detail(){
			$data = array();
			$data['content'] = "pages/standar3/reguler_detail";
			$this->load->view('dashboard',$data);
		}

	}