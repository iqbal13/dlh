

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">
                            <h3 class="text-center"> Laporan TPS Seluruh Wilayah</h3>
                            <a class="btn btn-primary" href="<?php echo base_url() ?>laporan/export_tps/kota"> Export </a>
     				</div>
     				<div class="box-body">
                
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php foreach($kota as $k => $val){ 

    ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="a-<?php echo $k ?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $k ?>" aria-expanded="true" aria-controls="collapseOne">
                <?php echo $val['kota'] ?> 
        </a>
      </h4>
    </div>
    <div id="collapse-<?php echo $k ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <?php 
            $a = $this->db->get_where('v_laporan_tps_full',array('wilayah' => $val['kota']));
        $tps = $a->result_array();


        ?>
                            <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="3" class="text-center"> No </th>
                                                <th rowspan="3" class="text-center"> Kecamatan </th>
                                                <th colspan="10" class="text-center">   Jenis TPS </TH>
                                                  <th rowspan="2" colspan="2" class="text-center"> Jumlah </th>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-center"> Pool Gerobak </th>
                                                <th colspan="2" class="text-center"> Pool Kontainer </th>
                                                <th colspan="2" class="text-center"> Bak Beton </th>
                                                <th colspan="2" class="text-center"> DIPO </th>
                                                <th colspan="2" class="text-center"> TPS / TPS 3R </th>

                                            </tr>
                                            <tr>
                                                <?php for($x=1;$x<=5;$x++){ ?>
                                                <th class="text-center"> Unit </th>
                                                <th  class="text-center"> Kendaraan </th>
                                                <?php  } ?>
                                                <th> Unit </th>
                                                <th> Kendaraan </th>
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
                                            $total_dipo = 0;
                                            $total_kendaraandipo = 0;
                                               $total_tps3r = 0;
                                            $total_kendaraantps3r = 0;
                                            foreach($tps as $k => $val):

                                         $total_poolgerobak = $total_poolgerobak + $val['pool_gerobak'];
                                            $total_kendaraanpoolgerobak = $total_kendaraanpoolgerobak + $val['kendaraan_poolgerobak']; 
                                            $total_poolcontainer = $total_poolcontainer + $val['pool_container'];
                                            $total_kendaraanpoolcontainer = $total_kendaraanpoolcontainer + $val['kendaraan_poolcontainer'];
                                            $total_bakbeton = $total_bakbeton  + $val['bak_beton'];
                                            $total_kendaraanbakbeton = $total_kendaraanbakbeton + $val['kendaraan_bakbeton'];
                                            $total_dipo = $total_dipo + $val['dipo'];
                                            $total_kendaraandipo = $total_kendaraandipo + $val['kendaraan_dipo'];
                                             $total_tps3r = $total_tps3r + $val['tps3r'];
                                            $total_kendaraantps3r = $total_kendaraantps3r + $val['kendaraan_tps3r'];





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
                                                    <td> <?php echo $val['dipo']; ?> </td>
                                                    <td> <?php echo $val['kendaraan_dipo']; ?> </td>
                                                    <td> <?php echo $val['tps3r']; ?></td>
                                                    <td> <?php echo $val['kendaraan_tps3r']; ?></td>
                                                      <td> <?php echo $val['pool_gerobak'] + $val['pool_container'] + $val['bak_beton'] + $val['dipo'] + $val['tps3r']; ?>  </td>
                                                    <td> 
                                                        <?php echo $val['kendaraan_poolgerobak'] + $val['kendaraan_poolcontainer'] + $val['kendaraan_bakbeton'] + $val['kendaraan_dipo'] + $val['kendaraan_tps3r']; ?> </td>
                                                    </td>
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
                                                <td> <?=$total_dipo;?></td>
                                                <td> <?=$total_kendaraandipo; ?></td>
                                                <td> <?=$total_tps3r;?></td>
                                                <td> <?=$total_kendaraantps3r; ?></td>
                                                    <td> <?=$total_poolgerobak + $total_poolcontainer + $total_bakbeton + $total_dipo + $total_tps3r; ?>  </td>
                                                <td> <?=$total_kendaraanpoolgerobak + $total_kendaraanpoolcontainer + $total_kendaraanbakbeton + $total_kendaraandipo + $total_kendaraantps3r; ?>  </td>
                                            </tr>
                                        </tbody>
                            </table>
      </div>
    </div>
  </div>
  <?php } ?>
</div>


     				</div>

     		</div>
        </div>
      </div>
    </section>  
