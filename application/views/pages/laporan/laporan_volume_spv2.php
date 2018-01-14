

    <section class="content">
      <div class="col-md-12">
        <div class="row">
            
            <div class="box box-success">
                    <div class="box-header">

                    <h3 class="text-center"> Data Volume Sampah Kota : <?php echo $_SESSION['kota']; ?> </h3>

                    </div>
                    <div class="box-body">
                
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
                        <td> <?php echo $bulan[$b]['total_volume']; ?>  </td>
                        <td> <a href="<?php echo base_url() ?>laporan/laporan_volume/harian/<?php echo $bulan[$b]['bulan']; ?>/kota"> Detail </a> </td>
                    </tr>
                    <?php } ?>

                </table>
                            

                    </div>

            </div>
        </div>
      </div>
    </section>  
