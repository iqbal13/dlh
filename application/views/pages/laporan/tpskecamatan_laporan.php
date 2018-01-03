

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">
                            <h3 class="text-center"> Laporan TPS Kecamatan : <?php echo $_SESSION['kecamatan']; ?> </h3>

     				</div>
     				<div class="box-body">
             
                            <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2"> No </th>
                                                <th rowspan="2"> Kode TPS </th>
                                                <th rowspan="2"> Nama TPS </th>
                                                <th colspan="5" class="text-center">   Jenis TPS </TH>
                                                <th rowspan="2"> Kendaraan </th>
                                            </tr>
                                            <tr>
                                                <th> DIPO </th>
                                                <th> TPS/TPS 3R </th>
                                                <th> Pool Gerobak </th>
                                                <th> Pool Container </th>
                                                <th> Bak Beton </th>
                                            </tr>
                                        </thead>
                                            <?php 
                                            $dipo = 0;
                                            $tps3r = 0;
                                            $poolgerobak = 0;
                                            $poolcontainer = 0;
                                            $bakbeton = 0;
                                            $kendaraan = 0;
                                            foreach($tps as $key => $val){ 
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


                                                ?>
                                            <tr>
                                                <td> <?php echo $key + 1;?> </td>
                                                <td> <?php echo $val['Kode_tps']; ?></td>
                                                <td> <?php echo $val['Nama_TPS']; ?></td>
                                                <td> <?php echo @$dipo_nilai; ?></td>
                                                <td> <?php echo @$tps3r_nilai; ?></td>
                                                <td> <?php echo @$poolgerobak_nilai; ?></td>
                                                <td> <?php echo @$poolcontainer_nilai; ?></td>
                                                <td> <?php echo @$bakbeton_nilai; ?></td>
                                                <td> <?php echo @$kendaraan_nilai; ?></td>
                                            </tr>
                                            <?php } ?>

                                                <tr>
                                                        <td colspan="3"> Jumlah </td>
                                                            <td> <?php echo $dipo;  ?> </td>
                                                            <td> <?php echo $tps3r; ?> </td>
                                                            <td> <?php echo $poolgerobak; ?> </td>
                                                            <td> <?php echo $poolcontainer; ?> </td>
                                                            <td> <?php echo $bakbeton; ?> </td>
                                                            <td> <?php echo $kendaraan; ?> </td>


                                                </tr>

                            </table>

     				</div>

     		</div>
        </div>
      </div>
    </section>  
