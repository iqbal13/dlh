

    <section class="content">
      <div class="col-md-12">
        <div class="row">
            
            <div class="box box-success">
                    <div class="box-header">

                    <h3 class="text-center"> Data Volume Sampah Per Kecamatan : <?php echo $_SESSION['kecamatan']; ?> Tahun : 
                            <?php echo @$_SESSION['tahun'] == '' ? date('Y') : $_SESSION['tahun']; ?>

                      </div>
                    <div class="box-body">
                
                            <?php
                             $now =date('Y');

                             ?>
                <div class="pull-right">
                    <label> Pilih Tahun </label>
                    <select class="form-control" name="tahun" onchange="pilihtahun(this.value)">
                            <?php
                           
                            for($x = $now - 1; $x <= $now + 1; $x++){ 
                                    if(@trim($_SESSION['tahun']) == $x){
                                        $select ='selected="selected"';
                                    }else{

                                        if(@$_SESSION['tahun'] == ''){
                                        if($x == $now){
                                            $select ='selected="selected"';
                                        }else{
                                            $select ='';
                                        }

                                    }else{
                                        $select = '';
                                    }

                                    }
                                        ?>


                                    <option value="<?php echo $x ?>" <?=$select; ?>> <?php echo $x ?> </option>
                            <?php
                            }
                            ?>

                      <!--   <option value="2017"> 2017 </option>
  <option value="2018"> 2018 </option>
    <option value="2019"> 2019 </option> -->
                    </select>
                </div>
                <div class="clearfix"> </div>
                <br />

                <table class="table table-striped">
                    <tr>
                        <th> No </th>
                        <th> Bulan </th>
                        <th> Jumlah </th>
                        <th> Detail </th>
                    </tr>
                    <?php 
                        if(count($bulannya) == 0){
                                echo "<tr><td colspan='4'> Belum ada data yang diinput </td> </tr>";

                        }else{ 
                    foreach($bulannya as $b => $val){
                     ?>
                    <tr>
                        <td> <?php echo $b+1; ?> </td>
                        <td> <?php echo $val; ?> </td>
                        <td> <?php echo $bulan[$b]['total_volume']; ?>  </td>
                        <td> <a href="<?php echo base_url() ?>laporan/laporan_volume/harian/<?php echo $bulan[$b]['bulan']; ?>"> Detail </a> </td>
                    </tr>
                    <?php } 

                    }
                    ?>

                </table>
                            

                    </div>

            </div>
        </div>
      </div>
    </section>  


