<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volume extends CI_Controller {

		function __construct(){
			parent::__construct();
			cek_login();
		}

	
	public function index()
	{

			$where = '';

if($this->session->userdata('level') == 'Admin'){
			$data['tps'] = $this->db->get('master_tps')->result_array();

		}else if($this->session->userdata('level') == 'Operator'){
			$kecamatan = $this->session->userdata('kecamatan');
				$where = " WHERE Kecamatan = '$kecamatan'";

		}


		$query = $this->db->query("SELECT * FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps $where");
			$data['tps'] = $query->result_array();

		$data['content'] = "pages/volume/index";
		$this->load->view('dashboard',$data);
	}

		public function add()
	{

		if($this->session->userdata('level') == 'Admin'){
			$data['tps'] = $this->db->get('master_tps')->result_array();
		}else if($this->session->userdata('level') == 'Operator'){
			$kecamatan = $this->session->userdata('kecamatan');
			$data['tps'] = $this->db->get_where('master_tps',array('Kecamatan' => $kecamatan))->result_array();
		}

		$data['content'] = "pages/volume/add";
		$this->load->view('dashboard',$data);
	}


	public function edit($id = "")
	{

			if($this->session->userdata('level') == 'Admin'){
			$data['tps'] = $this->db->get('master_tps')->result_array();
		}else if($this->session->userdata('level') == 'Operator'){
			$kecamatan = $this->session->userdata('kecamatan');
			$data['tps'] = $this->db->get_where('master_tps',array('Kecamatan' => $kecamatan))->result_array();
		}


		$data['volume'] = $this->db->query("SELECT * FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE id_volume = '$id'")->row_array();
		$data['content'] = "pages/volume/edit";
		$this->load->view('dashboard',$data);
	}


	function proses(){
		$aksi = $_POST['aksi'];

			if($aksi == "tambah"){
				$volume = $_POST['volume'];
				$kode_tps = $_POST['tps'];
				if($_POST['tanggal'] == ""){
					$tanggal = date('Y-m-d');
				}else{
					$tanggal = $_POST['tanggal'];
				}


					$dt = array(
						'kode_tps' => $kode_tps,
						'volume' => $volume,
						'status' => 1,
						'tanggal' => $tanggal,
						'waktu' => date('Y-m-d H:i:s'),
						'id_user' => $this->session->userdata('id_user'),
						'created_by' => $this->session->userdata('username'),
						'created_date' => date('Y-m-d H:i:s'));

					$query = $this->db->insert('volume_tps',$dt);
					if($query){
						$this->session->set_flashdata('item','<div class="alert alert-info"> Volume Berhasil Ditambahkan </div>');

					}else{
												$this->session->set_flashdata('item','<div class="alert alert-danger"> Volume GAGAL Ditambahkan </div>');

					}

					redirect('volume');

			}else if($aksi == "edit"){
					$id = $_POST['id'];

					$volume = $_POST['volume'];
				$kode_tps = $_POST['tps'];
				if($_POST['tanggal'] == ""){
					$tanggal = date('Y-m-d');
				}else{
					$tanggal = $_POST['tanggal'];
				}


					$dt = array(
						'kode_tps' => $kode_tps,
						'volume' => $volume,
						'status' => 1,
						'tanggal' => $tanggal,
						'waktu' => date('Y-m-d H:i:s'),
						'id_user' => $this->session->userdata('id_user'),
						'created_by' => $this->session->userdata('username'),
						'created_date' => date('Y-m-d H:i:s'));

					$query = $this->db->update('volume_tps',$dt,array('id_volume' => $id));
					if($query){
						$this->session->set_flashdata('item','<div class="alert alert-info"> Volume Berhasil Ditambahkan </div>');

					}else{
												$this->session->set_flashdata('item','<div class="alert alert-danger"> Volume GAGAL Ditambahkan </div>');

					}



			}

	}


	public function delete($id = 0)
	{

			$a = $this->db->delete('volume',array('id' => $id));
			if($a){
				$this->session->set_flashdata('item','<div class="alert alert-info"> Data Volume Berhasil Dihapus </div>');
			}

			redirect('volume');
	}


	
}