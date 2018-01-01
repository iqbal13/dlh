

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center"> Data Volume TPS </h3>
                       <a class="btn btn-primary" href="<?php echo base_url() ?>volume/add"> Tambah Data </a>


     				</div>
     				<div class="box-body">
                      <br />
     			
                            <table class="table table-striped table-bordered display responsive nowrap" id="tabel-data">
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
                                                <th> Status </th>

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
                                                <td> <?php echo tgl_indo($val['tanggal']) ?> </td>
                                                <Td> <?php echo $val['created_by'] ?> </td>
                                            <td> 

                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    if($level == 'Operatora'){ ?>
                                                            <a href="#">Edit</a>
                                                        <a href="#">Delete</a>

                                                    <?php }else if($level == 'Operator'){?>
                                                        <a href="<?php echo base_url() ?>volume/edit/<?php echo $val['id_volume'] ?>" class="btn btn-primary">Edit</a>
                                                        <a href="<?php echo base_url() ?>volume/delete/<?php echo $val['id_volume'] ?>" onclick="return confirm('Hapus data ini ? data akan terhapus permanen')" class="btn btn-danger"> Delete</a>

                                                    <?php } else if($level == 'Supervisor1'){ ?>
                                                        <a href="<?php echo base_url() ?>volume/edit/<?php echo $val['id_volume'] ?>" class="btn btn-primary">Edit</a>
                                                        <?php if($val['status'] == 1){ ?>
                                                        <a href="<?php echo base_url() ?>volume/validasi/<?php echo $val['id_volume'] ?>?id_status=2" class="btn btn-success" onclick="return confirm('Validasi Data Ini')">Validasi</a>
                                                        <?php } else if($val['status'] == 2){ ?>
                                                        <a href="<?php echo base_url() ?>volume/validasi/<?php echo $val['id_volume'] ?>?id_status=1" class="btn btn-danger" onclick="return confirm('Validasi Data Ini')">Batal Validasi</a>

                                                        <?php } ?>


                                                    <?php }else if($level == 'Supervisor2'){ ?>
                                                    
                                                    <?php }
                                                    ?>

                                             </td>
                                             <td> <?php
                                             if($val['status'] == 1){
                                              echo "Data Belum Divalidasi SPV 1";
                                             }else if($val['status'] == 2){
                                              echo "Data Telah Tervalidasi dan Dikirim ke SPV 2";
                                             }else if($val['status'] == 3){
                                                echo "Data Tervalidasi SPV 2";
                                             } else if($val['status'] == 9){
                                                echo "Data Ditolak SPV 2 , Harap Dibenarkan";
                                             }else{

                                             }
                                             ?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                            </table>

     				</div>

     		</div>
        </div>
      </div>
    </section>  
