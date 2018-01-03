<?php


		class Laporan extends CI_Controller {

				function __construct(){
					parent::__construct();


				}
				public function exportexcel($tipe = "kecamatan", $tanggal = 0)
        {
            $this->load->library("Excel/PHPExcel");
 
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

									$a = $this->db->query("SELECT SUM(VOLUME) as volume , min(tanggal) as tanggal_min , max(tanggal) as tanggal_max, volume_tps.kode_tps,nama_tps FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE master_tps.Kecamatan = '$kecamatan' GROUP BY volume_tps.kode_tps");
										$data['tanggal'] = $tanggal;
										$data['tgl'] = $this->db->query("SELECT tanggal FROM volume_tps GROUP BY tanggal ORDER BY tanggal ASC")->result_array();

							}else{

									$data['tanggal'] = $tanggal;

									$a = $this->db->query("SELECT SUM(VOLUME) as volume , min(tanggal) as tanggal_min , max(tanggal) as tanggal_max, volume_tps.kode_tps,nama_tps FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE master_tps.Kecamatan = '$kecamatan' AND tanggal = '$tanggal' GROUP BY volume_tps.kode_tps, tanggal");



							}


							$data['data'] = $a->result_array();

							$data['content'] = "pages/laporan/perkecamatan_laporan";


							$this->load->view('dashboard',$data);


						}else if($tipe == "kota"){
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

									$data['data'] = $a->result_array();
									$data['content'] = "pages/laporan/perkota_laporan";
									$this->load->view('dashboard',$data);

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

				function tps_perwilayah(){



						$tps = "SELECT * FROM master_tps WHERE Kecamatan = '$kecamatan'";
						$data['tps'] = $this->db->query($tps)->result_array();
						$data['content'] = "pages/laporan/tps_perkecamatan";

						$this->load->view('dashboard',$data);


				}





		}