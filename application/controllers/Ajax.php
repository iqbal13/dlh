<?php
	
	class Ajax extends CI_Controller {

		function __construct(){
			parent::__construct();
		}

		function getkabupaten(){
				$kecamatan = $_POST['kecamatan'];
				$a = $this->db->get_where('master_kelurahan',array('nama_kecamatan' => $kecamatan))->result_array();
				echo json_encode($a);

		}

		function pilihtahun(){
			$tahun = $_POST['tahun'];
			$_SESSION['tahun'] = $tahun;
		}

	}