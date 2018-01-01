<?php


		class Laporan extends CI_Controller {

				function __construct(){
					parent::__construct();


				}

				function index($id = 0){

						$id = str_replace('-',' ',$id);
						$a = $this->db->get_where('v_laporan2',array('Kecamatan' => $id))->result_array();


						$data['tps'] = $a;
						$data['content'] = "pages/laporan/perkecamatan";

						$this->load->view('dashboard',$data);

				}

				function per_kota(){
					$kota = $_SESSION['kota'];
					$has = "SELECT SUM(volume) as total_volume, Kecamatan, tanggal,status FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps left join master_kecamatan ON master_tps.Kecamatan = master_kecamatan.nama_kecamatan LEFT JOIN master_kota ON master_kecamatan.id_kota = master_kota.id_kota WHERE kota = '$kota' AND (status = 2 OR status = 3) GROUP BY Kecamatan,tanggal";
	
		$query = $this->db->query($has);

		$data['tps'] = $query->result_array();
		$data['content'] = "pages/laporan/perkota";
		$this->load->view('dashboard',$data);

				}





		}