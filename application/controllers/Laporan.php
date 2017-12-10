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


		}