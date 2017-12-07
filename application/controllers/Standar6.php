<?php
	class Standar6 extends CI_Controller {


		function __construct(){
			parent::__construct();
		}

		function index(){

		}


		function penerimaandana(){

			$data = array();
			$data['content'] = "pages/standar6/penerimaandana";
			$this->load->view('dashboard',$data);

		}

		function penggunaandana(){
			$data = array();
			$data['content'] = "pages/standar6/penggunaandana";
			$this->load->view('dashboard',$data);
		}

		function danapenelitian(){
			$data = array();
			$data['content'] = "pages/standar6/danapenelitian";
			$this->load->view('dashboard',$data);
		}

		function danapengabdian(){
			$data = array();
			$data['content'] = "pages/standar6/danapengabdian";
			$this->load->view('dashboard',$data);
		}

	}