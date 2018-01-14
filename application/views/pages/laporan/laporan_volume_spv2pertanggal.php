

    <section class="content">
      <div class="col-md-12">
        <div class="row">
            
            <div class="box box-success">
                    <div class="box-header">
                   <a href="<?php echo base_url() ?>laporan/laporan_volume" class="btn btn-primary"> Kembali </a> 
                    <h3 class="text-center"> Data Volume Sampah Kota <?php echo $_SESSION['kota']; ?>

                     <br /> Bulan : <?php echo $bulan; ?> </h3>

                    </div>
                    <div class="box-body">
                
                <table class="table table-stripped">
                    <tr>
                        <th> No </th>
                        <th> Tanggal </th>
                        <th> Jumlah </th>
                        <th> Detail </th>
                    </tr>
                    <?php foreach($tanggal as $b => $val){ ?>
                    <tr>
                        <td> <?php echo $b+1; ?> </td>
                        <td> <?php echo tgl_indo($val['tanggal']); ?> </td>
                        <td> <?php echo $val['total_volume']; ?> </td>
                        <td> <a href="<?php echo base_url() ?>laporan/volume/kota/<?php echo $val['tanggal']; ?>"> Detail </a> </td>
                    </tr>
                    <?php } ?>

                </table>
                            

                    </div>

            </div>
        </div>
      </div>
    </section>  
