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

		}else if($this->session->userdata('level') == 'Operator' OR $this->session->userdata('level') == 'Supervisor1'){
			$kecamatan = $this->session->userdata('kecamatan');
				$where = " WHERE Kecamatan = '$kecamatan'";
			$data['kecamatan'] = " Di Kecamatan ".$kecamatan;
		}else if($this->session->userdata('level') =='Supervisor2'){
$kecamatan = $this->session->userdata('kota');
                $where = " WHERE Wilayah = '$kecamatan'";
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

        if($_SESSION['level'] == 'Operator' OR $_SESSION['level'] == 'Supervisor2'){

            $data['kelurahan'] = $this->db->get_where('master_kelurahan',array('nama_kecamatan' => $_SESSION['kecamatan']))->result_array();
        }else{
                        $data['kelurahan'] = $this->db->get_where('master_kelurahan',array('nama_kecamatan' => $_SESSION['kecamatan']))->result_array();

        }


		$data['js_under'] = "pages/tps/js_under_add";
		$this->load->view('dashboard',$data);
	}


	public function edit($id = "")
	{
  if($_SESSION['level'] == 'Operator' OR $_SESSION['level'] == 'Supervisor2'){

            $data['kelurahan'] = $this->db->get_where('master_kelurahan',array('nama_kecamatan' => $_SESSION['kecamatan']))->result_array();
        }else{
                        $data['kelurahan'] = $this->db->get_where('master_kelurahan',array('nama_kecamatan' => $_SESSION['kecamatan']))->result_array();

        }
	$data['tps'] = $this->db->get_where('master_tps',array('Kode_tps' => $id))->row_array();
		$data['content'] = "pages/tps/edit";
		$this->load->view('dashboard',$data);
	}


	function proses(){
		//$aksi = $_POST['aksi'];



        $aksi = $_POST['aksi'];
			if($aksi == "tambah"){
		
            
                $this->load->library('form_validation');
                $this->form_validation->set_rules('kode_tps','Kode TPS','required|is_unique[master_tps.Kode_tps]');

                if($this->form_validation->run() == TRUE){ 

	$kode_tps = $_POST['kode_tps'];
    $nama_tps = @$_POST['nama_tps'];
    $koordinat = @$_POST['lintang'];
    $bujur = @$_POST['bujur'];
    $penanggung_jawab = @$_POST['penanggung_jawab'];
    $no_hp = @$_POST['no_hp'];
    $alamat_tps = @$_POST['alamat_tps'];
    $kelurahan = @$_POST['kelurahan'];
    $kecamatan = @$_POST['kecamatan'];
    $wilayah = @$_POST['wilayah'];
    $jenis_tps = @$_POST['jenis_tps'];
    $luas_lahan = @$_POST['luas_lahan'];
    $status_lahan 	= @$_POST['status_lahan'];
    $sumber_sampah = @$_POST['sumber_sampah'];
    $atap = @$_POST['atap'];
    $dinding = @$_POST['dinding'];
    $landasan = @$_POST['landasan'];
    $container = @$_POST['container'];
    $saluran_air_lindi = @$_POST['saluran_air'];
    $penampungan_air_lindi = @$_POST['penampungan_air'];
    $penghijauan = @$_POST['penghijauan'];
    $sumber_air = @$_POST['sumber_air'];
    $truk = @$_POST['truk'];
    $nama_truk = @$_POST['nama_truk'];
    $jenis_truk = @$_POST['jenis_truk'];
    $nomer_truk = @$_POST['nomer_truk'];
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

    $filename = strtotime(date('Y-m-d')).mt_rand(1,100);

                $config['upload_path']          = './foto_tps/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);

           

    if($_FILES['foto_pertama']['tmp_name']){
     if (!$this->upload->do_upload('foto_pertama'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
         
                        $foto_pertama = $data['upload_data']['file_name'];


                }


    }else{
        $foto_pertama = "";
    }

    $filename2 = strtotime(date('Y-m-d')).mt_rand(1,100);

                $config['upload_path']          = './foto_tps/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
                $config['file_name'] = $filename2;
                $this->load->library('upload', $config);

    
    if($_FILES['foto_kedua']['tmp_name']){

    if (!$this->upload->do_upload('foto_kedua'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $foto_kedua = $data['upload_data']['file_name'];
                }

    }else{
        $foto_ketiga = "";

    }

    $filename3 = strtotime(date('Y-m-d')).mt_rand(1,100);

     $config['upload_path']          = './foto_tps/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
                $config['file_name'] = $filename2;
                $this->load->library('upload', $config);

    
    if($_FILES['foto_ketiga']['tmp_name']){

    if (!$this->upload->do_upload('foto_ketiga'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());


                        $foto_ketiga = $data['upload_data']['file_name'];
                }


    }else{

        $foto_ketiga = "";

    }









    $query = "INSERT INTO master_tps SET
                                                Kode_tps = '$kode_tps',
                                                Nama_TPS = '$nama_tps',
                                                Kordinat_Lintang = '$koordinat',
                                                Kordinat_Bujur = '$bujur',
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
                                                Keterangan = '$keterangan',
                                                Foto_TPS = '$foto_pertama',
                                                foto_tps2 = '$foto_kedua',
                                                foto_tps3 = '$foto_ketiga'";
                                              
  
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

    }else{
                    $this->session->set_flashdata('item','<div class="alert alert-danger"> Kode TPS tidak boleh sama </div>');

        redirect('tps/add');
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
    $nama_truk = @$_POST['nama_truk'];
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


            $config['upload_path']          = './foto_tps/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
                $this->load->library('upload', $config);

           

    if($_FILES['foto_pertama']['tmp_name']){
     if (!$this->upload->do_upload('foto_pertama'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
         
                        $foto_pertama = $data['upload_data']['file_name'];



                }


    }else{
        $foto_pertama = $_POST['foto_pertamalama'];
    }



    
    if($_FILES['foto_kedua']['tmp_name']){

    if (!$this->upload->do_upload('foto_kedua'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $foto_kedua = $data['upload_data']['file_name'];
                }

    }else{
        $foto_kedua = $_POST['foto_kedualama'];

    }



    
    if($_FILES['foto_ketiga']['tmp_name']){

    if (!$this->upload->do_upload('foto_ketiga'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        // $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());


                        $foto_ketiga = $data['upload_data']['file_name'];
                }


    }else{

        $foto_ketiga = $_POST['foto_ketigalama'];

    }




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
                                                Foto_TPS = '$foto_pertama',
                                                foto_tps2 = '$foto_kedua',
                                                foto_tps3 = '$foto_ketiga',
                                                Keterangan = '$keterangan' where Kode_tps = '$kode_tps'";

                                                $dt = $this->db->query($query);
                                                if($dt){
                                                    redirect('tps');
                                                }
			}

	}


	public function delete($id)
	{
        $id = $this->uri->segment(3);
            if($id == ""){
                redirect('tps');
            }else{
            $qq = "DELETE FROM master_tps WHERE Kode_tps = '$id'";
            $a = $this->db->query($qq);
			if($a){
				$this->session->set_flashdata('item','<div class="alert alert-info"> Data TPS Berhasil Dihapus </div>');
			}

			redirect('tps');
	}

}




	
}
