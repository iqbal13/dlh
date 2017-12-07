<?php
	
	class Ajax extends CI_Controller {

		function __construct(){
			parent::__construct();
		}

		function pilihprodi(){
			$id_prodi = $this->input->post('id_prodi');	

			$cek = $this->db->get_where('prodi',array('kode_prodi' => $id_prodi))->row_array();
			$data = array(
				'kode_prodi' => $cek['kode_prodi'],
				'nama_prodi' => $cek['nama_prodi'],
				'kode_fakultas' => $cek['kode_fakultas']);

			$this->session->set_userdata($data);
			echo $data['nama_prodi'];

		}

	}