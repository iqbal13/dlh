

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center"> Data TPS <?php echo $kecamatan ?> </h3>
<a href="<?php echo base_url() ?>tps/add" class="btn btn-primary pull-right"> Tambah Data TPS </a>
                    
     				</div>
     				<div class="box-body">
     						
     			    <br />
                            <table class="table table-striped table-bordered" id="tabel-data">
                                    <thead>
                                            <tr class="text-center">
                                                <th> No </th>
                                                <th> Kode TPS </th>
                                                <th> Nama TPS </th>
                                                <th> Kelurahan </th>
                                                <th> Kecamatan </th>

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
                                              <td>
                                               <a href="#" class="btn btn-success"> Detail </a> 
                                               <a href="#" class="btn btn-primary"> Edit </a> 
                                               <a href="#" class="btn btn-danger" onclick="return confirm('Hapus data ini ? Data akan terhapus permananen')"> Hapus </a> 
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
