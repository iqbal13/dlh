

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center"> Laporan Volume Sampah Per Kota : <?php echo $_SESSION['kota'] ?> <?php if(@$tanggal != '') echo $tanggal; ?></h3>

     				</div>
     				<div class="box-body">
              <?php 
                       $url = base_url()."laporan/exportexcel/".$this->uri->segment(3);
                       if(@$this->uri->segment(4) != ''){ 
                            $url .= "/".$this->uri->segment(4);
                       }
                       ?>

                            <a class="btn btn-primary" href="<?php echo $url ?>"> Export </a>


                            <?php if(@$tanggal == ""){ ?>
                                <p> Pilih Tanggal </p>
                                    <ul>
                                <?php 
                                foreach($tgl as $t){ ?>
                                    <li> <a href="<?php echo base_url() ?>laporan/volume/kota/<?php echo $t['tanggal']; ?>"> <?php echo $t['tanggal']; ?> </a> </li>
                                <?php } ?>
                                    </ul>
                                    <h3> Laporan Volume per TPS Total  </h3>
                            <?php  }else{ echo "<h3> Laporan Volume per TPS tanggal ".$tanggal."</h3>"; } ?>
     				           <table class="table table-primary">
                                    <tr>
                                        <th> No </th>
                                        <th> Kecamatan </th>
                                        <Th> Volume Sampah </Th>
                                    </tr>
                                    <?php 
                                    $total = 0;
                                    foreach($data as $key => $val){
                                            $total = $total + $val['volume'];
                                     ?>
                                        <tr>
                                            <td> <?php echo $key+1;?> </td>
                                            <td> <?php echo $val['Kecamatan'];?> </td>
                                            <td> <?php echo number_format($val['volume'],0,",","."); ?></td>
                                            </tr>
                                    <?php } ?>
                                        <tr>
                                            <td colspan="2"> Jumlah </td>
                                            <td> <?php echo number_format($total,0,",","."); ?></td>
                                        </tr>
                                    </table>
                            

     				</div>

     		</div>
        </div>
      </div>
    </section>  
