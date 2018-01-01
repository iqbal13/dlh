<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tps extends CI_Controller {

		function __construct(){
			parent::__construct();
			cek_login();
		}

	
	public function index()
	{

			$where = '';
				$data['kecamatan'] = "";
if($this->session->userdata('level') == 'Admin'){
			$data['tps'] = $this->db->get('master_tps')->result_array();

		}else if($this->session->userdata('level') == 'Operator'){
			$kecamatan = $this->session->userdata('kecamatan');
				$where = " WHERE Kecamatan = '$kecamatan'";
			$data['kecamatan'] = " Di Kecamatan ".$kecamatan;
		}
		$query = $this->db->query("SELECT * FROM master_tps $where");
			$data['tps'] = $query->result_array();
		$data['content'] = "pages/tps/index";
		$this->load->view('dashboard',$data);
	}

		public function add()
	{

		$data['field'] = $this->db->query("DESC master_tps")->result_array();

		$data['content'] = "pages/tps/add";
		$data['kecamatan'] = $this->db->get('master_kecamatan')->result_array();
		$data['js_under'] = "pages/tps/js_under_add";
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


		$data['volume'] = $this->db->query("SELECT * FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE id_volume = '$id'")->result_array();
		$data['content'] = "pages/volume/add";
		$this->load->view('dashboard',$data);
	}


	function proses(){
		//$aksi = $_POST['aksi'];
			$aksi = "tambah";
			if($aksi == "tambah"){
			
				$a = $this->db->query("DESC master_tps");
		$b = $a->result_array();

		foreach($b as $k => $v){
			$dt[$v['Field']] = $_POST[$v['Field']];
		}
		print_r($dt);

		$a = $this->db->insert('master_tps',$dt);
		if($a){

			$this->session->set_flashdata('item','<div class="alert alert-info"> TPS Berhasil ditambahkan </div>');
			redirect('tps');

		}else{
			echo "ga error";
		}
			}else if($aksi == "edit"){

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
