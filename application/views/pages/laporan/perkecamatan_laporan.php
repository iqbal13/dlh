

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center"> Laporan Volume Sampah DI Kecamatan : <?php echo $_SESSION['kecamatan'] ?> <?php if(@$tanggal != '') echo $tanggal; ?></h3>

     				</div>
     				<div class="box-body">
                       <?php 
                       $url = base_url()."laporan/exportexcel/".$this->uri->segment(3);
                       if(@$this->uri->segment(4) != ''){ 
                            $url .= "/".$this->uri->segment(4);
                       }
                       ?>
                       <?php if(count($data) != 0){ ?>
                            <a class="btn btn-primary" href="<?php echo $url ?>"> Export </a>
                            <?php } ?>


                            
                            <?php if(@$tanggal == ""){ ?>
                                <p> Pilih Tanggal </p>
                                    <ul>
                                <?php 
                                foreach($tgl as $t){ ?>
                                    <li> <a href="<?php echo base_url() ?>laporan/volume/kecamatan/<?php echo $t['tanggal']; ?>"> <?php echo $t['tanggal']; ?> </a> </li>
                                <?php } ?>
                                    </ul>
                                    <h3> Laporan Volume per TPS Total  </h3>
                            <?php  }else{ echo "<h3> Laporan Volume per TPS tanggal ".$tanggal."</h3>"; } ?>
     				           <table class="table table-primary">
                                    <tr>
                                        <th> No </th>
                                        <th> Kode TPS </th>
                                        <th> Nama TPS </th>
                                        <Th> Volume Sampah </Th>
                                    </tr>
                                    <?php 
                                    $total = 0;
                                    foreach($data as $key => $val){
                                            $total = $total + $val['volume'];
                                     ?>
                                        <tr>
                                            <td> <?php echo $key+1;?> </td>
                                            <td> <?php echo $val['kode_tps'];?> </td>
                                            <td> <?php echo $val['nama_tps'];?></td>
                                            <td> <?php echo number_format($val['volume'],0,",","."); ?></td>
                                            </tr>
                                    <?php } ?>
                                        <tr>
                                            <td colspan="3"> Jumlah </td>
                                            <td> <?php echo number_format($total,0,",","."); ?></td>
                                        </tr>
                                    </table>
                            

     				</div>

     		</div>
        </div>
      </div>
    </section>  
