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


		$data['volume'] = $this->db->query("SELECT * FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = mail(to, subject, message)ster_tps.Kode_tps WHERE id_volume = '$id'")->result_array();
		$data['content'] = "pages/volume/add";
		$this->load->view('dashboard',$data);
	}


	function proses(){
		//$aksi = $_POST['aksi'];
			$aksi = "tambah";
			if($aksi == "tambah"){
			
		
				 $nama_tps = $_POST['nama_tps'];
    $koordinat = $_POST['koordinat'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $no_hp = $_POST['no_hp'];
    $alamat_tps = $_POST['alamat_tps'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $wilayah = $_POST['wilayah'];
    $jenis_tps = $_POST['jenis_tps'];
    $luas_lahan = $_POST['luas_lahan'];
    $status_lahan 	= $_POST['status_lahan'];
    $volume_sampah = $_POST['volume_sampah'];
    $sumber_sampah = $_POST['sumber_sampah'];
    $atap = $_POST['atap'];
    $dinding = $_POST['dinding'];
    $landasan = $_POST['landasan'];
    $container = $_POST['container'];
    $saluran_air_lindi = $_POST['saluran_air'];
    $penampungan_air_lindi = $_POST['penampungan_air'];
    $penghijauan = $_POST['penghijauan'];
    $sumber_air = $_POST['sumber_air'];
    $truk = $_POST['truk'];
    $nama_truk = $_POST['nama_truk'];
    $jenis_truk = $_POST['jenis_truk'];
    $nomer_truk = $_POST['nomer_truk'];
    $alat_berat = $_POST['alat_berat'];
    $composting = $_POST['composting'];
    $pencacah_organik = $_POST['pencacah_organik'];
    $pencacah_anorganik = $_POST['pencacah_anorganik'];
    $pengayak = $_POST['pengayak'];
    $alat_press = $_POST['alat_press'];
    $jam_pengumpulan = $_POST['jam_pengumpulan'];
    $jam_pengangkutan = $_POST['jam_pengangkutan'];
    $permasalahan = $_POST['permasalahan'];
    $keterangan = $_POST['keterangan'];

  
    $ins = $this->db->query("INSERT INTO master_tps SET
                                                nama_tps = '$nama_tps',
                                                koordinat = '$koordinat',
                                                penanggung_jawab = '$penanggung_jawab',
                                                no_hp = '$no_hp',
                                                alamat_tps = '$alamat_tps',
                                                kelurahan = '$kelurahan',
                                                kecamatan = '$kecamatan',
                                                wilayah = '$wilayah',
                                                jenis_tps = '$jenis_tps',
                                                luas_lahan = '$luas_lahan',
                                                status_lahan = '$status_lahan',
                                                volume_sampah = '$volume_sampah',
                                                sumber_sampah = '$sumber_sampah',
                                                atap = '$atap',
                                                dinding = '$dinding',
                                                landasan = '$landasan',
                                                container = '$container',
                                                saluran_air_lindi = '$saluran_air_lindi',
                                                penampungan_air_lindi = '$penampungan_air_lindi',
                                                penghijauan = '$penghijauan',
                                                sumber_air = '$sumber_air',
                                                truk = '$truk',
                                                nama_truk = '$nama_truk',
                                                jenis_truk = '$jenis_truk',
                                                nomer_truk = '$nomer_truk',
                                                alat_berat = '$alat_berat',
                                                composting = '$composting',
                                                pencacah_organik = '$pencacah_organik',
                                                pencacah_anorganik = '$pencacah_anorganik',
                                                pengayak = '$pengayak',
                                                alat_press = '$alat_press',
                                                jam_pengumpulan = '$jam_pengumpulan',
                                                jam_pengangkutan = '$jam_pengangkutan',
                                                permasalahan = '$permasalahan',
                                                keterangan = '$keterangan'");



		if($ins){

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
