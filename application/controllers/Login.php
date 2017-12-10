<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	
	public function index()
	{

		$this->load->view('login');
	}

	function proses(){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$a = $this->db->get_where('user',array('username' => $username,'password' => $password))->result_array();

		if(count($a) == 0){
			$this->session->set_flashdata('item','<div class="alert alert-danger"> Maaf Username atau Password anda salah.. </div>');
			redirect('login');
		}else{
			$dt = array(
				'login' => TRUE,
				'username' => $username,
				'id_user' => $a[0]['id_user'],
				'level' => $a[0]['level'],
				'kota' => $a[0]['id_kota'],
				'kecamatan' => $a[0]['kecamatan']);

			$this->session->set_userdata($dt);
						$this->session->set_flashdata('item','<div class="alert alert-info">Login Berhasil.. </div>');
			redirect('home');
		}


	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	function eror(){
		$this->load->view('notfound');
	}
}
