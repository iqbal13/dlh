<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Volume extends CI_Controller {

		function __construct(){
			parent::__construct();
			cek_login();
		}


	public function datavolumeall(){
		$kota = $this->session->userdata('kota');
		if($this->session->userdata('level') == 'Supervisor2'){
		$has = "SELECT SUM(volume) as total_volume, Kecamatan, tanggal,status FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps left join master_kecamatan ON master_tps.Kecamatan = master_kecamatan.nama_kecamatan LEFT JOIN master_kota ON master_kecamatan.id_kota = master_kota.id_kota WHERE kota = '$kota' AND (status = 2 OR status = 3) GROUP BY Kecamatan,tanggal";
		echo $has;
	}else{

	$has = "SELECT SUM(volume) as total_volume, Kecamatan, tanggal,status FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps left join master_kecamatan ON master_tps.Kecamatan = master_kecamatan.nama_kecamatan LEFT JOIN master_kota ON master_kecamatan.id_kota = master_kota.id_kota  WHERE (status = 2 OR status = 3) GROUP BY Kecamatan,tanggal";

	}
		$query = $this->db->query($has);

		$data['tps'] = $query->result_array();
		$data['content'] = "pages/volume/dataall";

		$this->load->view('dashboard',$data);
	}

	
	public function index()
	{

			$where = '';

if($this->session->userdata('level') == 'Admin'){
			$data['tps'] = $this->db->get('master_tps')->result_array();

		}else if($this->session->userdata('level') == 'Operator' OR $this->session->userdata('level') == 'Supervisor1'){
			$kecamatan = $this->session->userdata('kecamatan');
				$where = " WHERE Kecamatan = '$kecamatan'";

		}else if($this->session->userdata('level') == 'Supervisor2'){
			$kota = $this->session->userdata('kota');
			$where = " WHERE Wilayah = '$kota";
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
		}else if($this->session->userdata('level') == 'Supervisor1'){
			$kecamatan = $this->session->userdata('kota');
			$data['tps'] = $this->db->get_where('master_tps',array('Wilayah' => $kecamatan))->result_array();
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
else if($this->session->userdata('level') == 'Supervisor1'){
			$kecamatan = $this->session->userdata('kota');
			// print_r($_SESSION);
			// exit;
			$data['tps'] = $this->db->get_where('master_tps',array('Wilayah' => $kecamatan))->result_array();
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

					if($_SESSION['level'] == 'Operator'){
						redirect('volume/add');
					}else{
					redirect('volume');
						}

					

			}

	}


	public function delete($id = 0)
	{

			$a = $this->db->delete('volume_tps',array('id_volume' => $id));
			if($a){
				$this->session->set_flashdata('item','<div class="alert alert-info"> Data Volume Berhasil Dihapus </div>');
			}

			redirect('volume');
	}

	public function validasi($id = 0){

			$id_status = $_GET['id_status'];

			$dt = array('status' => $id_status);
			$update = $this->db->update('volume_tps',$dt,array('id_volume' => $id));

				if($update){
									$this->session->set_flashdata('item','<div class="alert alert-info"> Data Volume Berhasil Dirubah </div>');
										redirect('volume');
								}else{
									redirect('404');
								}


	}


	public function  approval($id = 0){


			$kecamatan = $_POST['kecamatan'];
			$tgl = $_POST['tanggal'];	

			$approve = $_POST['approve'];

		if($approve == 'approve'){
			
		$dt = 	$this->db->get_where('master_tps',array('Kecamatan' => $kecamatan))->result_array();

		foreach($dt as $k => $val){

			$query = "UPDATE volume_tps SET status = 3 WHERE kode_tps ='$val[Kode_tps]' AND tanggal = '$tgl'";
			$b = $this->db->query($query);

		}

		}else if($approve == 'reject'){
			// echo "uey";
		$dt = 	$this->db->get_where('master_tps',array('Kecamatan' => $kecamatan))->result_array();

		foreach($dt as $k => $val){

			$query = "UPDATE volume_tps SET status = 9 WHERE kode_tps ='$val[Kode_tps]' AND tanggal = '$tgl'";
			//echo $query;
			$b = $this->db->query($query);
			//exit;

		}


		}


		$this->session->set_flashdata('item','<div class="alert alert-info"> Aksi Berhasil Dilakukan </div>');
		redirect('volume/datavolumeall');

	}


	
}
