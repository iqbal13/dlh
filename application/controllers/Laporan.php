<?php


		class Laporan extends CI_Controller {

				function __construct(){
					parent::__construct();


				}

				function index($id = 0){

						echo str_replace('-',' ',$id);

						$a = $this->db->get_where('v_laporan_per_tps',array('Kecamatan' => $id))->result_array();
						echo count($a);
				}


		}