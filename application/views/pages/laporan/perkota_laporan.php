

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">
                        <?php
                        $tanggal = $this->uri->segment(4);
                        ?>
	        		<h3 class="text-center"> Laporan Volume Sampah Per Kota : <?php echo $_SESSION['kota'] ?> <?php if(@$tanggal != '') echo "Pada Tangal : ".tgl_indo($tanggal); ?></h3>

     				</div>
     				<div class="box-body">
              <?php 
                       $url = base_url()."laporan/exportexcel/".$this->uri->segment(3);
                       if(@$this->uri->segment(4) != ''){ 
                            $url .= "/".$this->uri->segment(4);
                       }
                       ?>

                            <a class="btn btn-primary" href="<?php echo $url ?>"> Export </a>


                    
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
