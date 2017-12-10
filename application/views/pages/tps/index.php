

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center"> Data Volume TPS </h3>

     				</div>
     				<div class="box-body">
     						
     			
                            <table class="table table-striped table-bordered">
                                    <thead>
                                            <tr class="text-center">
                                                <th> No </th>
                                                <th> Kode TPS </th>
                                                <th> Nama TPS </th>
                                                <th> Kelurahan </th>
                                                <th> Kecamatan </th>
                                                <th> Volume </th>
                                                <th> Tanggal </th>
                                                <th> Input Data </th>
                                                <th> Aksi </th>

                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($tps as $k => $val){ ?>
                                            <tr>
                                                <td> <?php echo $k + 1 ?> </td>
                                                <td> <?php echo $val['Kode_tps'] ?></td>
                                                <td> <?php echo $val['Nama_TPS'] ?></td>
                                                <td> <?php echo $val['Kelurahan'] ?></td>
                                                <td> <?php echo $val['Kecamatan'] ?></td>
                                                <td> <?php echo $val['volume'] ?>  </td>
                                                <td> <?php echo $val['tanggal'] ?> </td>
                                                <Td> <?php echo $val['created_by'] ?> </td>
                                            <td> 

                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    if($level == 'Operator'){ ?>
                                                            <a href="#">Edit</a>
                                                        <a href="#">Delete</a>

                                                    <?php }else if($level == 'Admin'){?>
                                                        <a href="<?php echo base_url() ?>volume/edit/<?php echo $val['id_volume'] ?>">Edit</a>
                                                        <a href="#">Delete</a>

                                                    <?php } else if($level == 'Supervisor1'){ ?>

                                                    <?php }else if($level == 'Supervisor2'){ ?>

                                                    <?php }
                                                    ?>

                                             </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                            </table>

     				</div>

     		</div>
        </div>
      </div>
    </section>  
