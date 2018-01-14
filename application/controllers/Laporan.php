<?php


		class Laporan extends CI_Controller {

				function __construct(){
					parent::__construct();

            $this->load->library("Excel/PHPExcel");

				}



        public function laporan_volume($tipe = "bulanan", $bulan = 1, $jenis = "kecamatan"){
          $tahun = date('Y');

          if($jenis == 'kecamatan'){ 



          if($tipe == "bulanan"){
          $data['content'] = "pages/laporan/laporan_volume_spv1";

          $data['bulan']  =$this->db->query("SELECT SUBSTR(tanggal,6,2) as bulan, SUM(volume) as total_volume FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE Wilayah = '$_SESSION[kota]' AND SUBSTR(tanggal,1,4) = $tahun GROUP BY SUBSTR(tanggal,6,2), SUBSTR(tanggal,1,4)")->result_array();

          $bulan = array();
          foreach($data['bulan'] as $b){
            array_push($bulan,bulan($b['bulan']));


          }
          $data['bulannya'] = $bulan;

        }else{
          $data['bulan'] = bulan($bulan);
          $data['content'] = "pages/laporan/laporan_volume_spv1pertanggal";
          $data['tanggal']  =$this->db->query("SELECT tanggal, SUM(volume) as total_volume FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE Kecamatan = '$_SESSION[kecamatan]' AND SUBSTR(tanggal,6,2) = $bulan AND SUBSTR(tanggal,1,4) = $tahun GROUP BY SUBSTR(tanggal,9,2), SUBSTR(tanggal,1,4)")->result_array();


        }


      }else if($jenis == 'kota'){

           if($tipe == "bulanan"){
          $data['content'] = "pages/laporan/laporan_volume_spv2";

          $data['bulan']  =$this->db->query("SELECT SUBSTR(tanggal,6,2) as bulan, SUM(volume) as total_volume FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE Wilayah = '$_SESSION[kota]' AND SUBSTR(tanggal,1,4) = $tahun   GROUP BY SUBSTR(tanggal,6,2), SUBSTR(tanggal,1,4)")->result_array();

          $bulan = array();
          foreach($data['bulan'] as $b){
            array_push($bulan,bulan($b['bulan']));


          }
          $data['bulannya'] = $bulan;

        }else{
          $data['bulan'] = bulan($bulan);
          $data['content'] = "pages/laporan/laporan_volume_spv2pertanggal";
          $data['tanggal']  =$this->db->query("SELECT tanggal, SUM(volume) as total_volume FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE Wilayah = '$_SESSION[kota]' AND SUBSTR(tanggal,6,2) = $bulan AND SUBSTR(tanggal,1,4) = $tahun GROUP BY SUBSTR(tanggal,9,2), SUBSTR(tanggal,1,4)")->result_array();


        }




      }

          $this->load->view('dashboard',$data);
        }


				public function exportexcel($tipe = "kecamatan", $tanggal = 0)
        {
 
            $objPHPExcel = new PHPExcel();

            	if($tipe == 'kecamatan'){
					$kecamatan = $_SESSION['kecamatan'];
					if($tanggal == 0){

						$a = $this->db->query("SELECT SUM(VOLUME) as volume , min(tanggal) as tanggal_min , max(tanggal) as tanggal_max, volume_tps.kode_tps,nama_tps FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE master_tps.Kecamatan = '$kecamatan' GROUP BY volume_tps.kode_tps");
						$data['tanggal'] = $tanggal;
						$data['tgl'] = $this->db->query("SELECT tanggal FROM volume_tps GROUP BY tanggal ORDER BY tanggal ASC")->result_array();

					}else{
						$data['tanggal'] = $tanggal;
						$a = $this->db->query("SELECT SUM(VOLUME) as volume , min(tanggal) as tanggal_min , max(tanggal) as tanggal_max, volume_tps.kode_tps,nama_tps FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE master_tps.Kecamatan = '$kecamatan' AND tanggal = '$tanggal' GROUP BY volume_tps.kode_tps, tanggal");
						}


							$dt = $a->result_array();


						}else{ 


									$kota = $_SESSION['kota'];
								if($tanggal == 0){
									$query = "SELECT SUM(VOLUME) as volume , Kecamatan FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE master_tps.Wilayah = '$kota'  GROUP BY master_tps.Kecamatan";
$a = $this->db->query($query);
		
	$data['tgl'] = $this->db->query("SELECT tanggal FROM volume_tps GROUP BY tanggal ORDER BY tanggal ASC")->result_array();



								}else{
									$query = "SELECT SUM(VOLUME) as volume , Kecamatan FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE master_tps.Wilayah = '$kota' AND tanggal = '$tanggal'  GROUP BY master_tps.Kecamatan,tanggal";

$a = $this->db->query($query);
	$data['tgl'] = $this->db->query("SELECT tanggal FROM volume_tps GROUP BY tanggal ORDER BY tanggal ASC")->result_array();



						}

		$dt = $a->result_array();

}


if($tipe == "kecamatan"){

             $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'Laporan Volume Sampah Kecamatan '.$kecamatan);

                                        	// if(@$tanggal != 0){
                                        	// 	$objPHPExcel->getActiveSheet()->setCellValue('A2'.$row,'Tanggal : '.$tanggal);
                                        	// }

                                        	$row = 4;

$objPHPExcel->getActiveSheet(0)
            ->setCellValue('A3', 'No')
            ->setCellValue('B3','Kode TPS')
            ->setCellValue('C3','Nama TPS')
            ->setCellValue('D3','Volume Sampah');


              foreach($dt as $k => $val){

              		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$k+1);
              		$objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$val['kode_tps']);
              		$objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$val['nama_tps']);
              		$objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$val['volume']);
              			$row = $row + 1;
              }


            $objPHPExcel->getActiveSheet()->setTitle('Laporan Per Kecamatan');
 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="laporanpertps.xlsx"');
            //unduh file
            $objWriter->save("php://output");
 
            //Mulai dari create object PHPExcel itu ada dokumentasi lengkapnya di PHPExcel, 
            // Folder Documentation dan Example
            // untuk belajar lebih jauh mengenai PHPExcel silakan buka disitu
 
}else{ 


    $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'Laporan Volume Sampah Per Wilayah '.$kota);

                                        	// if(@$tanggal != 0){
                                        	// 	$objPHPExcel->getActiveSheet()->setCellValue('A2'.$row,'Tanggal : '.$tanggal);
                                        	// }

                                        	$row = 4;

$objPHPExcel->getActiveSheet(0)
            ->setCellValue('A3', 'No')
            ->setCellValue('B3','Kecamatan')
            ->setCellValue('C3','Volume Sampah');


              foreach($dt as $k => $val){

              		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$k+1);
              		$objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$val['Kecamatan']);
              		$objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$val['volume']);
              			$row = $row + 1;
              }


            $objPHPExcel->getActiveSheet()->setTitle('Laporan Per Wilayah');
 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="laporanperkota.xlsx"');
            //unduh file
            $objWriter->save("php://output");
 


}


        }


				function volume($tipe = 'kecamatan', $tanggal = 0){

						if($tipe == 'kecamatan'){
							
							$kecamatan = $_SESSION['kecamatan'];
							if($tanggal == 0){

									$a = $this->db->query("SELECT SUM(VOLUME) as volume , min(tanggal) as tanggal_min , max(tanggal) as tanggal_max, volume_tps.kode_tps,nama_tps FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE master_tps.Kecamatan = '$kecamatan' AND status != 9 AND status != 1 GROUP BY volume_tps.kode_tps");
										$data['tanggal'] = $tanggal;
										$data['tgl'] = $this->db->query("SELECT tanggal FROM volume_tps WHERE status != 9 AND status != 1 GROUP BY tanggal  ORDER BY tanggal ASC")->result_array();

							}else{

									$data['tanggal'] = $tanggal;

									$a = $this->db->query("SELECT SUM(VOLUME) as volume , min(tanggal) as tanggal_min , max(tanggal) as tanggal_max, volume_tps.kode_tps,nama_tps FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE master_tps.Kecamatan = '$kecamatan' AND tanggal = '$tanggal' AND status != 9 AND status != 1 GROUP BY volume_tps.kode_tps, tanggal");



							}


							$data['data'] = $a->result_array();

							$data['content'] = "pages/laporan/perkecamatan_laporan";


							$this->load->view('dashboard',$data);


						}else if($tipe == "kota"){

              if($_SESSION['level'] == 'Admin'){


                  $kota = $this->db->query("SELECT * FROM master_kota WHERE id_kota != 6")->result_array();
                  $data['tanggal'] = $tanggal;
                  $data['kota'] = $kota;
                  //$data['data'] = $a->result_array();
                  $data['content'] = "pages/laporan/volumeall_laporan";
                  $this->load->view('dashboard',$data);





              }else{

								$kota = $_SESSION['kota'];
								if($tanggal == 0){
									$query = "SELECT SUM(VOLUME) as volume , Kecamatan FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE master_tps.Wilayah = '$kota' AND status != 9 AND status != 1 GROUP BY master_tps.Kecamatan";
$a = $this->db->query($query);
		
	$data['tgl'] = $this->db->query("SELECT tanggal FROM volume_tps WHERE status != 9 AND status != 1 GROUP BY tanggal ORDER BY tanggal ASC")->result_array();



								}else{
									$query = "SELECT SUM(VOLUME) as volume , Kecamatan FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE master_tps.Wilayah = '$kota' AND tanggal = '$tanggal'  AND status != 9 AND status != 1 GROUP BY master_tps.Kecamatan,tanggal";

$a = $this->db->query($query);
	$data['tgl'] = $this->db->query("SELECT tanggal FROM volume_tps WHERE status != 9 AND status != 1 GROUP BY tanggal ORDER BY tanggal ASC")->result_array();


								}

									$data['data'] = $a->result_array();
									$data['content'] = "pages/laporan/perkota_laporan";
									$this->load->view('dashboard',$data);

						}

          } 

				}

				function index($id = 0){

						$id = str_replace('-',' ',$id);
						$a = $this->db->get_where('v_laporan2',array('Kecamatan' => $id))->result_array();


						$data['tps'] = $a;
						$data['content'] = "pages/laporan/perkecamatan";

						$this->load->view('dashboard',$data);

				}

				function per_kota(){

$filename ="excelreport.xls";
					$kota = $_SESSION['kota'];
					$has = "SELECT SUM(volume) as total_volume, Kecamatan, tanggal,status FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps left join master_kecamatan ON master_tps.Kecamatan = master_kecamatan.nama_kecamatan LEFT JOIN master_kota ON master_kecamatan.id_kota = master_kota.id_kota WHERE kota = '$kota' AND (status = 2 OR status = 3) GROUP BY Kecamatan,tanggal";
	
		$query = $this->db->query($has);

		$data['tps'] = $query->result_array();
		$data['content'] = "pages/laporan/perkota";
		
		$this->load->view('dashboard',$data);

				}



				function tps_perkecamatan(){
						$kecamatan = $_SESSION['kecamatan'];
						$tps = "SELECT * FROM master_tps WHERE Kecamatan = '$kecamatan'";
						$data['tps'] = $this->db->query($tps)->result_array();
						$data['content'] = "pages/laporan/tpskecamatan_laporan";

						$this->load->view('dashboard',$data);	

				}

				function tps_perkota(){

          if($_SESSION['level'] == 'Supervisor2'){

		$kota = $_SESSION['kota'];
		$a = $this->db->get_where('v_laporan_tps_full',array('wilayah' => $kota));
		$b = $a->result_array();

			$data['tps'] = $b;

			$data['content'] = "pages/laporan/tpswilayah_laporan";
			$this->load->view('dashboard',$data);

					 }else{ 

            $data['kota'] = $this->db->query("SELECT * FROM master_kota WHERE id_kota != 6")->result_array();
      $data['content'] = "pages/laporan/tpswilayahfull_laporan";
      $this->load->view('dashboard',$data);



           }


				}


        function tps_export($tipe = 'kecamatan', $kecamatan = ''){

          if($tipe == 'kecamatan'){

    $kecamatan = $_SESSION['kecamatan'];
            $tps = "SELECT * FROM master_tps WHERE Kecamatan = '$kecamatan'";
            $data['tps'] = $this->db->query($tps)->result_array();
            $data['content'] = "pages/laporan/tpskecamatan_laporan";



          }else{


          }

        }


				function export_tps($tipe){
 $this->load->library("Excel/PHPExcel");
 
            $objPHPExcel = new PHPExcel();

					if($tipe == 'kecamatan'){

					$kecamatan = $_SESSION['kecamatan'];
    $a = $this->db->get_where('master_tps',array('Kecamatan' => $kecamatan));
    $b = $a->result_array();


    $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'Laporan TPS Per Kecamatan '.$kecamatan);

                                          // if(@$tanggal != 0){
                                          //  $objPHPExcel->getActiveSheet()->setCellValue('A2'.$row,'Tanggal : '.$tanggal);
                                          // }

                                          $row = 7;

$objPHPExcel->getActiveSheet(0)
            ->setCellValue('A3', 'No')
            ->setCellValue('B3','Kode TPS')
            ->setCellValue('C3','Nama TPS')
            ->setCellValue('D3','Jenis TPS')
            ->setCellValue('D4','DIPO')
            ->setCellValue('E4','TPS / TPS 3R')
            ->setCellValue('F4','Pool Gerobak')
            ->setCellValue('G4','Pool Container')
            ->setCellValue('H4','Bak Beton')
            ->setCellValue('I3','Kendaraan');
  $dipo = 0;
                                            $tps3r = 0;
                                            $poolgerobak = 0;
                                            $poolcontainer = 0;
                                            $bakbeton = 0;
                                            $kendaraan = 0;
              foreach($b as $k => $val){


                                        $kendaraan_nilai = 0;
                                                    if($val['Truk'] != '' OR $val['Truk'] != NULL){
                                                    $pisahkendaraan = explode(" ",$val['Truk']);
                                                        $kendaraan_nilai = $pisahkendaraan[0];
                                                        $kendaraan = $kendaraan + $kendaraan_nilai;
                                                    }

                                                $dipo_nilai = "";
                                                $tps3r_nilai = "";
                                                $poolgerobak_nilai = "";
                                                $poolcontainer_nilai = "";
                                                $bakbeton_nilai = "";
                                            if($val['Jenis_TPS'] == 'Dipo') {
                                                $dipo = $dipo + 1;
                                                $dipo_nilai = 1;
                                            }else  if($val['Jenis_TPS'] == 'Pool Gerobak') {
                                                $poolgerobak = $poolgerobak + 1;
                                                $poolgerobak_nilai = 1;
                                            }else  if($val['Jenis_TPS'] == 'Pool Kontainer') {
                                                $poolcontainer = $poolcontainer + 1;
                                                $poolcontainer_nilai = 1;
                                            }else  if($val['Jenis_TPS'] == 'TPS / TPS 3R') {
                                                $tps3r = $tps3r + 1;
                                                $tps3r_nilai = 1;
                                            }else if($val['Jenis_TPS'] == 'Bak Beton') {
                                                $bakbeton = $bakbeton + 1;
                                                $bakbeton_nilai = 1;
                                            }


                  $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$k+1);
                  $objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$val['Kode_tps']);
                  $objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$val['Nama_TPS']);
                  $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$dipo_nilai);
                  $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$tps3r_nilai);
                  $objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$poolgerobak_nilai);
                  $objPHPExcel->getActiveSheet()->setCellValue('G'.$row,$poolcontainer_nilai);
                  $objPHPExcel->getActiveSheet()->setCellValue('H'.$row,$bakbeton_nilai);
                  $objPHPExcel->getActiveSheet()->setCellValue('I'.$row,$kendaraan_nilai);
                    $row = $row + 1;
              }


              
                  $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,'JUMLAH');
                  $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$dipo);
                  $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$tps3r);
                  $objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$poolgerobak);
                  $objPHPExcel->getActiveSheet()->setCellValue('G'.$row,$poolcontainer);
                  $objPHPExcel->getActiveSheet()->setCellValue('H'.$row,$bakbeton);
                  $objPHPExcel->getActiveSheet()->setCellValue('I'.$row,$kendaraan);


            $objPHPExcel->getActiveSheet()->setTitle('Laporan Per Kecamatan');
 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="laporanperkota.xlsx"');
            //unduh file
            $objWriter->save("php://output");




					}else{


            if($_SESSION['level'] == 'Supervisor2'){
	$kota = $_SESSION['kota'];
		$a = $this->db->get_where('v_laporan_tps_full',array('wilayah' => $kota));
		$b = $a->result_array();


	  $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'Laporan TPS Per Wilayah '.$kota);

                                        	// if(@$tanggal != 0){
                                        	// 	$objPHPExcel->getActiveSheet()->setCellValue('A2'.$row,'Tanggal : '.$tanggal);
                                        	// }

                                        	$row = 7;

$objPHPExcel->getActiveSheet(0)
            ->setCellValue('A3', 'No')
            ->setCellValue('B3','Kecamatan')
            ->setCellValue('C3','Jenis TPS')
            ->setCellValue('C4','Pool Gerobak')
            ->setCellValue('E4','Pool Kontainer')
            ->setCellValue('G4','Bak Beton')
            ->setCellValue('I4','Lainya')
            ->setCellValue('C5','Unit')
            ->setCellValue('D5','Kendaraan')
            ->setCellValue('E5','Unit')
            ->setCellValue('F5','Kendaraan')
            ->setCellValue('G5','Unit')
            ->setCellValue('H5','Kendaraan')
            ->setCellValue('I5','Unit')
            ->setCellValue('J5','Kendaraan');

  $total_poolgerobak = 0;
                                            $total_kendaraanpoolgerobak = 0; 
                                            $total_poolcontainer = 0;
                                            $total_kendaraanpoolcontainer = 0;
                                            $total_bakbeton = 0;
                                            $total_kendaraanbakbeton = 0;
                                            $total_dll = 0;
                                            $total_kendaarandll = 0;
              foreach($b as $k => $val){


                                         $total_poolgerobak = $total_poolgerobak + $val['pool_gerobak'];
                                            $total_kendaraanpoolgerobak = $total_kendaraanpoolgerobak + $val['kendaraan_poolgerobak']; 
                                            $total_poolcontainer = $total_poolcontainer + $val['pool_container'];
                                            $total_kendaraanpoolcontainer = $total_kendaraanpoolcontainer + $val['kendaraan_poolcontainer'];
                                            $total_bakbeton = $total_bakbeton  + $val['bak_beton'];
                                            $total_kendaraanbakbeton = $total_kendaraanbakbeton + $val['kendaraan_bakbeton'];
                                            $total_dll = $total_dll + $val['dipo'] + $val['tps3r'];
                                            $total_kendaarandll = $total_kendaarandll + $val['kendaraan_dipo'] + $val['kendaraan_tps3r'];


              		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$k+1);
              		$objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$val['Kecamatan']);
              		$objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$val['pool_gerobak']);
              		$objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$val['kendaraan_poolgerobak']);
              		$objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$val['pool_container']);
              		$objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$val['kendaraan_poolcontainer']);
              		$objPHPExcel->getActiveSheet()->setCellValue('G'.$row,$val['bak_beton']);
              		$objPHPExcel->getActiveSheet()->setCellValue('H'.$row,$val['kendaraan_bakbeton']);
              		$objPHPExcel->getActiveSheet()->setCellValue('I'.$row,$val['dipo'] + $val['tps3r']);
              		$objPHPExcel->getActiveSheet()->setCellValue('J'.$row,$val['kendaraan_dipo'] + $val['kendaraan_tps3r']);
              			$row = $row + 1;
              }


              	$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,'Jumlah');
              		$objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$total_poolgerobak);
              		$objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$total_kendaraanpoolgerobak);
              		$objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$total_poolcontainer);
              		$objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$total_kendaraanpoolcontainer);
              		$objPHPExcel->getActiveSheet()->setCellValue('G'.$row,$total_bakbeton);
              		$objPHPExcel->getActiveSheet()->setCellValue('H'.$row,$total_kendaraanbakbeton);
              		$objPHPExcel->getActiveSheet()->setCellValue('I'.$row,$total_dll);
              		$objPHPExcel->getActiveSheet()->setCellValue('J'.$row,$total_kendaarandll);


            $objPHPExcel->getActiveSheet()->setTitle('Laporan Per Wilayah');
 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="laporanperkota.xlsx"');
            //unduh file
            $objWriter->save("php://output");

}else{
$kota = $this->db->query("SELECT * FROM master_kota WHERE id_kota != 6")->result_array();
  // $a = $this->db->get_where('v_laporan_tps_full',array('wilayah' => $_SESSION['kota']));
  //   $b = $a->result_array();


    $objPHPExcel->setActiveSheetIndex(0)
                                        ->setCellValue('A1', 'Laporan TPS');

                                        $row = 3;


foreach($kota as $k => $val){ 

  $a = $this->db->get_where('v_laporan_tps_full',array('wilayah' => $val['kota']));
    $b = $a->result_array();

$objPHPExcel->getActiveSheet(0)
            ->setCellValue('A'.$row, 'Wilayah  :'.$val['kota']);

            $row = $row + 2;
            $rowplussatu = $row + 1;
            $rowplusdua = $row + 2;

$objPHPExcel->getActiveSheet(0)
            ->setCellValue('A'.$row, 'No')
            ->setCellValue('B'.$row,'Kecamatan')
            ->setCellValue('C'.$row,'Jenis TPS')
            ->setCellValue('C'.$rowplussatu,'Pool Gerobak')
            ->setCellValue('E'.$rowplussatu,'Pool Kontainer')
            ->setCellValue('G'.$rowplussatu,'Bak Beton')
            ->setCellValue('I'.$rowplussatu,'Lainya')
            ->setCellValue('C'.$rowplussatu,'Unit')
            ->setCellValue('D'.$rowplusdua,'Kendaraan')
            ->setCellValue('E'.$rowplusdua,'Unit')
            ->setCellValue('F'.$rowplusdua,'Kendaraan')
            ->setCellValue('G'.$rowplusdua,'Unit')
            ->setCellValue('H'.$rowplusdua,'Kendaraan')
            ->setCellValue('I'.$rowplusdua,'Unit')
            ->setCellValue('J'.$rowplusdua,'Kendaraan');

            $row = $row + 1;
  $total_poolgerobak = 0;
                                            $total_kendaraanpoolgerobak = 0; 
                                            $total_poolcontainer = 0;
                                            $total_kendaraanpoolcontainer = 0;
                                            $total_bakbeton = 0;
                                            $total_kendaraanbakbeton = 0;
                                            $total_dll = 0;
                                            $total_kendaarandll = 0;


                                          // $row = 7;


              foreach($b as $k => $val){


                                         $total_poolgerobak = $total_poolgerobak + $val['pool_gerobak'];
                                            $total_kendaraanpoolgerobak = $total_kendaraanpoolgerobak + $val['kendaraan_poolgerobak']; 
                                            $total_poolcontainer = $total_poolcontainer + $val['pool_container'];
                                            $total_kendaraanpoolcontainer = $total_kendaraanpoolcontainer + $val['kendaraan_poolcontainer'];
                                            $total_bakbeton = $total_bakbeton  + $val['bak_beton'];
                                            $total_kendaraanbakbeton = $total_kendaraanbakbeton + $val['kendaraan_bakbeton'];
                                            $total_dll = $total_dll + $val['dipo'] + $val['tps3r'];
                                            $total_kendaarandll = $total_kendaarandll + $val['kendaraan_dipo'] + $val['kendaraan_tps3r'];


                  $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$k+1);
                  $objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$val['Kecamatan']);
                  $objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$val['pool_gerobak']);
                  $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$val['kendaraan_poolgerobak']);
                  $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$val['pool_container']);
                  $objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$val['kendaraan_poolcontainer']);
                  $objPHPExcel->getActiveSheet()->setCellValue('G'.$row,$val['bak_beton']);
                  $objPHPExcel->getActiveSheet()->setCellValue('H'.$row,$val['kendaraan_bakbeton']);
                  $objPHPExcel->getActiveSheet()->setCellValue('I'.$row,$val['dipo'] + $val['tps3r']);
                  $objPHPExcel->getActiveSheet()->setCellValue('J'.$row,$val['kendaraan_dipo'] + $val['kendaraan_tps3r']);
                    $row = $row + 1;
              }


                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,'Jumlah');
                  $objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$total_poolgerobak);
                  $objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$total_kendaraanpoolgerobak);
                  $objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$total_poolcontainer);
                  $objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$total_kendaraanpoolcontainer);
                  $objPHPExcel->getActiveSheet()->setCellValue('G'.$row,$total_bakbeton);
                  $objPHPExcel->getActiveSheet()->setCellValue('H'.$row,$total_kendaraanbakbeton);
                  $objPHPExcel->getActiveSheet()->setCellValue('I'.$row,$total_dll);
                  $objPHPExcel->getActiveSheet()->setCellValue('J'.$row,$total_kendaarandll);

                  $row =  $row + 2;

}


            $objPHPExcel->getActiveSheet()->setTitle('Laporan Per Wilayah');
 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="laporanperkota.xlsx"');
            //unduh file
            $objWriter->save("php://output");


}

					}

				}





		}