

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center"> Manajemen User </h3>

     				</div>
     				<div class="box-body">
     						
     			    <a class="btn btn-primary" href="<?php echo base_url() ?>user/add"> Tambah User </a>
              <br />
                            <table class="table table-striped table-bordered" id="tabel-data">
                                    <thead>
                                            <tr class="text-center">
                                                <th> No </th>
                                                <th> Nama Lengkap </th>
                                                <th> Username </th>
                                                <th> Password </th>
                                                <th> Level </th>
                                                <th> Kecamatan </th>
                                                <th> Aksi </th>

                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($user as $k => $val){ ?>
                                            <tr>
                                                <td> <?php echo $k + 1 ?> </td>
                                                <td> <?php echo $val['nama_user'] ?></td>
                                                <td> <?php echo $val['username'] ?></td>
                                                <td> <?php echo $val['password'] ?></td>
                                                <td> <?php echo $val['level'] ?></td>
                                                <td> <?php echo $val['kecamatan'] ?>  </td>
                                                <td>
                                                    <a href="<?=base_url() ?>index.php/user/edit/<?=$val['id_user'];?>"> Edit </a>
                                                    <a href="<?=base_url() ?>index.php/user/delete/<?=$val['id_user'];?>" onclick="return confirm('Yakin hapus user ini ? aksi tidak dapat dibatalkan')"> Hapus </a>

                                                </td>
                                            <td>
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
