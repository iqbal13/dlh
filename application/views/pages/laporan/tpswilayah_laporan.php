

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">
                            <h3 class="text-center"> Laporan TPS Wilayah : <?php echo $_SESSION['kota']; ?> </h3>
                            <a class="btn btn-primary" href="<?php echo base_url() ?>laporan/export_tps/kota"> Export </a>
     				</div>
     				<div class="box-body">
             
                            <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="3" class="text-center"> No </th>
                                                <th rowspan="3" class="text-center"> Kecamatan </th>
                                                <th colspan="8" class="text-center">   Jenis TPS </TH>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-center"> Pool Gerobak </th>
                                                <th colspan="2" class="text-center"> Pool Kontainer </th>
                                                <th colspan="2" class="text-center"> Bak Beton </th>
                                                <th colspan="2" class="text-center"> DLL </th>
                                            </tr>
                                            <tr>
                                                <?php for($x=1;$x<=4;$x++){ ?>
                                                <th class="text-center"> Unit </th>
                                                <th  class="text-center"> Kendaraan </th>
                                                <?php  } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                            $total_poolgerobak = 0;
                                            $total_kendaraanpoolgerobak = 0; 
                                            $total_poolcontainer = 0;
                                            $total_kendaraanpoolcontainer = 0;
                                            $total_bakbeton = 0;
                                            $total_kendaraanbakbeton = 0;
                                            $total_dll = 0;
                                            $total_kendaarandll = 0;
                                            foreach($tps as $k => $val):

                                         $total_poolgerobak = $total_poolgerobak + $val['pool_gerobak'];
                                            $total_kendaraanpoolgerobak = $total_kendaraanpoolgerobak + $val['kendaraan_poolgerobak']; 
                                            $total_poolcontainer = $total_poolcontainer + $val['pool_container'];
                                            $total_kendaraanpoolcontainer = $total_kendaraanpoolcontainer + $val['kendaraan_poolcontainer'];
                                            $total_bakbeton = $total_bakbeton  + $val['bak_beton'];
                                            $total_kendaraanbakbeton = $total_kendaraanbakbeton + $val['kendaraan_bakbeton'];
                                            $total_dll = $total_dll + $val['dipo'] + $val['tps3r'];
                                            $total_kendaarandll = $total_kendaarandll + $val['kendaraan_dipo'] + $val['kendaraan_tps3r'];
                                             ?>
                                                <tr>
                                                    <td> <?php echo $k+1; ?> </td>
                                                    <td> <?php echo $val['Kecamatan']; ?> </td>
                                                    <td> <?php echo $val['pool_gerobak']; ?></td>
                                                    <td> <?php echo $val['kendaraan_poolgerobak']; ?></td>
                                                    <td> <?php echo $val['pool_container']; ?></td>
                                                    <td> <?php echo $val['kendaraan_poolcontainer']; ?></td>
                                                    <td> <?php echo $val['bak_beton']; ?></td>
                                                    <td> <?php echo $val['kendaraan_bakbeton']; ?></td>
                                                    <td> <?php echo $val['dipo']; + $val['tps3r'] ?></td>
                                                    <td> <?php echo $val['kendaraan_dipo'] + $val['kendaraan_tps3r']; ?></td>
                                                </tr>

                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="2"> Jumlah </td>
                                                <td> <?php echo $total_poolgerobak; ?> </td>
                                                <td> <?=$total_kendaraanpoolgerobak; ?></td>
                                                <td> <?=$total_poolcontainer; ?></td>
                                                <td> <?=$total_kendaraanpoolcontainer; ?></td>
                                                <td> <?=$total_bakbeton; ?></td>
                                                <td> <?=$total_kendaraanbakbeton; ?></td>
                                                <td> <?=$total_dll;?></td>
                                                <td> <?=$total_kendaarandll; ?></td>
                                            </tr>
                                        </tbody>
                            </table>

     				</div>

     		</div>
        </div>
      </div>
    </section>  
