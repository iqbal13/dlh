<?php
	class Standar4 extends CI_Controller {


		function __construct(){
			parent::__construct();
		}

		function index(){

		}


		function dosentetap(){

			$data = array();
			$data['content'] = "pages/standar4/dosentetap";
			$this->load->view('dashboard',$data);

		}

		function dosentetapdiluar(){
			$data = array();
			$data['content'] = "pages/standar4/dosentetapdiluar";
			$this->load->view('dashboard',$data);
		}

		
		function aktivitasdosentetap(){
			$data = array();
			$data['content'] = "pages/standar4/aktivitasdosentetap";
			$this->load->view('dashboard',$data);
		}
	function aktivitasdosentetapdiluar(){
			$data = array();
			$data['content'] = "pages/standar4/aktivitasdosentetapdiluar";
			$this->load->view('dashboard',$data);
		}

	}