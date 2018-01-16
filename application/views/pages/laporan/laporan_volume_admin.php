

    <section class="content">
      <div class="col-md-12">
        <div class="row">
            
            <div class="box box-success">
                    <div class="box-header">
                    </div>

                    <div class="box-body">

                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <?php

                                        foreach($kota as $k => $val){ ?> 
                                        <div class="panel panel-default">
                                              <div class="panel-heading" role="tab" id="a-<?php echo $k ?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $k ?>" aria-expanded="true" aria-controls="collapseOne">
                    <h5 class="text-center"> Data Volume Sampah Kota : <?php echo $val['kota']; ?> </h5>
        </a>
      </h4>
    </div>
    <div id="collapse-<?php echo $k ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

        <div class="panel-body">

            <?php
             // if($tipe == "bulanan"){
  $tahun = date('Y');
          $databulan  =$this->db->query("SELECT SUBSTR(tanggal,6,2) as bulan, SUM(volume) as total_volume FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE Wilayah = '$val[kota]' AND SUBSTR(tanggal,1,4) = $tahun   AND (status = 2 OR status = 3)  GROUP BY SUBSTR(tanggal,6,2), SUBSTR(tanggal,1,4)")->result_array();

          $bulan = array();
          foreach($databulan as $b){
            array_push($bulan,bulan($b['bulan']));


          }

          $bulannya = $bulan;
        //  $data['bulannya'] = $bulan;

        // }else{
        //   $data['bulan'] = bulan($bulan);
        //   $data['content'] = "pages/laporan/laporan_volume_spv2pertanggal";
        //   $data['tanggal']  =$this->db->query("SELECT tanggal, SUM(volume) as total_volume FROM volume_tps LEFT JOIN master_tps ON volume_tps.kode_tps = master_tps.Kode_tps WHERE Wilayah = '$_SESSION[kota]' AND SUBSTR(tanggal,6,2) = $bulan AND SUBSTR(tanggal,1,4) = $tahun   AND (status = 2 OR status = 3) GROUP BY SUBSTR(tanggal,9,2), SUBSTR(tanggal,1,4)")->result_array();


        // }
        ?>
     <table class="table table-striped">
                    <tr>
                        <th> No </th>
                        <th> Bulan </th>
                        <th> Jumlah </th>
                        <th> Detail </th>
                    </tr>
                    <?php foreach($bulannya as $b => $val){
                     ?>
                    <tr>
                        <td> <?php echo $b+1; ?> </td>
                        <td> <?php echo $val; ?> </td>
                        <td> <?php echo $databulan[$b]['total_volume']; ?>  </td>
                        <td> <a href="<?php echo base_url() ?>laporan/laporan_volume/harian/<?php echo $databulan[$b]['bulan']; ?>/kota"> Detail </a> </td>
                    </tr>
                    <?php } ?>

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
