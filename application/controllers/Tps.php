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


public function detail($id = 0)
    {

    
            $data['tps'] = $this->db->get_where('master_tps',array('Kode_tps' => $id))->result_array();
                    $data['content'] = "pages/tps/detail";
        $this->load->view('dashboard',$data);
    }

		public function add()
	{

		$data['field'] = $this->db->query("DESC master_tps")->result_array();

		$data['content'] = "pages/tps/add";
		$data['kecamatan'] = $this->db->get('master_kecamatan')->result_array();

        if($_SESSION['level'] == 'Operator'){

            $data['kelurahan'] = $this->db->get_where('master_kelurahan',array('nama_kecamatan' => $_SESSION['kecamatan']))->result_array();
        }

		$data['js_under'] = "pages/tps/js_under_add";
		$this->load->view('dashboard',$data);
	}


	public function edit($id = "")
	{

	$data['tps'] = $this->db->get_where('master_tps',array('Kode_tps' => $id))->row_array();
		$data['content'] = "pages/tps/edit";
		$this->load->view('dashboard',$data);
	}


	function proses(){
		//$aksi = $_POST['aksi'];

        $aksi = $_POST['aksi'];
			if($aksi == "tambah"){
			
		  $kode_tps = $_POST['kode_tps'];
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
    $sumber_sampah = $_POST['sumber_sampah'];
    $atap = @$_POST['atap'];
    $dinding = @$_POST['dinding'];
    $landasan = @$_POST['landasan'];
    $container = @$_POST['container'];
    $saluran_air_lindi = @$_POST['saluran_air'];
    $penampungan_air_lindi = @$_POST['penampungan_air'];
    $penghijauan = @$_POST['penghijauan'];
    $sumber_air = @$_POST['sumber_air'];
    $truk = @$_POST['truk'];
    $nama_truk = $_POST['nama_truk'];
    $jenis_truk = $_POST['jenis_truk'];
    $nomer_truk = $_POST['nomer_truk'];
    $alat_berat = @$_POST['alat_berat'];
    $composting = @$_POST['composting'];
    $pencacah_organik = @$_POST['pencacah_organik'];
    $pencacah_anorganik = @$_POST['pencacah_anorganik'];
    $pengayak = @$_POST['pengayak'];
    $alat_press = @$_POST['alat_press'];
    $jam_pengumpulan = $_POST['jam_pengumpulan'];
    $jam_pengangkutan = $_POST['jam_pengangkutan'];
    $permasalahan = $_POST['permasalahan'];
    $keterangan = $_POST['keterangan'];




    $query = "INSERT INTO master_tps SET
                                                Kode_tps = '$kode_tps',
                                                Nama_TPS = '$nama_tps',
                                                Kordinat_Lintang = '$koordinat',
                                                Penanggung_Jawab = '$penanggung_jawab',
                                                No_HP = '$no_hp',
                                                Alamat_TPS = '$alamat_tps',
                                                Kelurahan = '$kelurahan',
                                                Kecamatan = '$kecamatan',
                                                Wilayah = '$wilayah',
                                                Jenis_TPS = '$jenis_tps',
                                                Luas_lahan = '$luas_lahan',
                                                Status_Lahan = '$status_lahan',
                                                Sumber_Sampah = '$sumber_sampah',
                                                Atap = '$atap',
                                                Dinding = '$dinding',
                                                Landasan = '$landasan',
                                                Container = '$container',
                                                Saluran_Air_Lindi = '$saluran_air_lindi',
                                                Penampungan_Air_Lindi    = '$penampungan_air_lindi',
                                                Penghijauan = '$penghijauan',
                                                Sumber_Air = '$sumber_air',
                                                Truk = '$truk',
                                                jenis_truk = '$jenis_truk',
                                                nomer_pintu_truk = '$nomer_truk',
                                                Alat_Berat = '$alat_berat',
                                                Komposting = '$composting',
                                                Pencacah_Organik = '$pencacah_organik',
                                                Pencacah_Anorganik = '$pencacah_anorganik',
                                                Pengayak = '$pengayak',
                                                Alat_Press = '$alat_press',
                                                Jam_Pengumpulan = '$jam_pengumpulan',
                                                Jam_Pengangkutan = '$jam_pengangkutan',
                                                Permasalahan = '$permasalahan',
                                                Keterangan = '$keterangan'";
                                              
  
    $ins = $this->db->query($query);



		if($ins){

			$this->session->set_flashdata('item','<div class="alert alert-info"> TPS Berhasil ditambahkan </div>');
			if($_SESSION['level'] == 'Operator'){
            redirect('tps/add');
        }else {
            redirect('tps');
        }

		}else{
			echo "ga error";
		}
			}else if($aksi == "edit"){



          $kode_tps = $_POST['kode_tps'];
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
    $status_lahan   = $_POST['status_lahan'];
    $sumber_sampah = $_POST['sumber_sampah'];
    $atap = @$_POST['atap'];
    $dinding = @$_POST['dinding'];
    $landasan = @$_POST['landasan'];
    $container = @$_POST['container'];
    $saluran_air_lindi = @$_POST['saluran_air'];
    $penampungan_air_lindi = @$_POST['penampungan_air'];
    $penghijauan = @$_POST['penghijauan'];
    $sumber_air = @$_POST['sumber_air'];
    $truk = @$_POST['truk'];
    $nama_truk = $_POST['nama_truk'];
    $jenis_truk = $_POST['jenis_truk'];
    $nomer_truk = $_POST['nomer_truk'];
    $alat_berat = @$_POST['alat_berat'];
    $composting = @$_POST['composting'];
    $pencacah_organik = @$_POST['pencacah_organik'];
    $pencacah_anorganik = @$_POST['pencacah_anorganik'];
    $pengayak = @$_POST['pengayak'];
    $alat_press = @$_POST['alat_press'];
    $jam_pengumpulan = $_POST['jam_pengumpulan'];
    $jam_pengangkutan = $_POST['jam_pengangkutan'];
    $permasalahan = $_POST['permasalahan'];
    $keterangan = $_POST['keterangan'];




    $query = "UPDATE master_tps SET
                                                Nama_TPS = '$nama_tps',
                                                Kordinat_Lintang = '$koordinat',
                                                Penanggung_Jawab = '$penanggung_jawab',
                                                No_HP = '$no_hp',
                                                Alamat_TPS = '$alamat_tps',
                                                Kelurahan = '$kelurahan',
                                                Kecamatan = '$kecamatan',
                                                Wilayah = '$wilayah',
                                                Jenis_TPS = '$jenis_tps',
                                                Luas_lahan = '$luas_lahan',
                                                Status_Lahan = '$status_lahan',
                                                Sumber_Sampah = '$sumber_sampah',
                                                Atap = '$atap',
                                                Dinding = '$dinding',
                                                Landasan = '$landasan',
                                                Container = '$container',
                                                Saluran_Air_Lindi = '$saluran_air_lindi',
                                                Penampungan_Air_Lindi    = '$penampungan_air_lindi',
                                                Penghijauan = '$penghijauan',
                                                Sumber_Air = '$sumber_air',
                                                Truk = '$truk',
                                                jenis_truk = '$jenis_truk',
                                                nomer_pintu_truk = '$nomer_truk',
                                                Alat_Berat = '$alat_berat',
                                                Komposting = '$composting',
                                                Pencacah_Organik = '$pencacah_organik',
                                                Pencacah_Anorganik = '$pencacah_anorganik',
                                                Pengayak = '$pengayak',
                                                Alat_Press = '$alat_press',
                                                Jam_Pengumpulan = '$jam_pengumpulan',
                                                Jam_Pengangkutan = '$jam_pengangkutan',
                                                Permasalahan = '$permasalahan',
                                                Keterangan = '$keterangan' where Kode_tps = '$kode_tps'";


			}

	}


	public function delete($id = 0)
	{

			$a = $this->db->delete('master_tps',array('kode_tps' => $id));
			if($a){
				$this->session->set_flashdata('item','<div class="alert alert-info"> Data TPS Berhasil Dihapus </div>');
			}

			redirect('master_tps');
	}




	
}
