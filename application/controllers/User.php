<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

		function __construct(){
			parent::__construct();
			cek_login();
		}

	
	public function index()
	{

	$data['user'] = $this->db->get('user')->result_array();
		$data['content'] = "pages/user/index";
		$this->load->view('dashboard',$data);
	}

	function getkecamatan(){
		$id_kota = $_POST['kota'];
		$kota = $this->db->get_where('master_kota',array('kota' => $id_kota))->row_array();
		$data['kecamatan'] = $this->db->get_where('master_kecamatan',array('id_kota' => $kota['id_kota']))->result_array();

			$this->load->view('kecamatan',$data);
	}

		public function add()
	{

		$data['kota'] = $this->db->get('master_kota')->result_array();
		$data['js_under'] = "pages/user/js_under";

		$data['content'] = "pages/user/add";
		$this->load->view('dashboard',$data);
	}


	public function edit()
	{

		$data['content'] = "pages/volume/add";
		$this->load->view('dashboard',$data);
	}


	function proses(){
		$aksi = $_POST['aksi'];

			if($aksi == "tambah"){
			


					$dt = array(
						'nama_user' => $_POST['nama_user'],
						'username' => $_POST['username'],
						'password' => $_POST['password'],
						'level' => $_POST['level'],
						'kecamatan' => $_POST['kecamatan'],
						'id_kota' => $_POST['kota']
						);

					$query = $this->db->insert('user',$dt);
					if($query){
						$this->session->set_flashdata('item','<div class="alert alert-info"> Volume Berhasil Ditambahkan </div>');

					}else{
												$this->session->set_flashdata('item','<div class="alert alert-danger"> Volume GAGAL Ditambahkan </div>');

					}

					redirect('user');

			}

	}


	public function delete($id = 0)
	{

			$a = $this->db->delete('user',array('id' => $id));
			if($a){
				$this->session->set_flashdata('item','<div class="alert alert-info"> Data Volume Berhasil Dihapus </div>');
			}

			redirect('volume');
	}


	
}
