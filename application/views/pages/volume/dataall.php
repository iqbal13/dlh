

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center"> Data Volume TPS Per Kecamatan </h3>
                       <a class="btn btn-primary" href="<?php echo base_url() ?>volume/add"> Tambah Data </a>


     				</div>
     				<div class="box-body">
                      <br />
     			
                            <table class="table table-striped table-bordered display responsive nowrap" id="tabel-data">
                                    <thead>
                                            <tr class="text-center">
                                                <th> No </th>
                                                <th> Kecamatan </th>
                                                <th> Volume </th>
                                                <th> Tanggal Input </th>
                                                <th> Aksi </th>

                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($tps as $k => $val){ ?>
                                            <tr>
                                                <td> <?php echo $k + 1 ?> </td>
                                                <td> <?php echo $val['Kecamatan'] ?></td>
                                                <td> <?php echo $val['total_volume'] ?></td>
                                                <td> <?php echo tgl_indo($val['tanggal']) ?> </td>
                                                <td>

                                                	<form method="POST" action="<?php echo base_url() ?>volume/approval">
                                                		<input type="hidden" name="kecamatan" value="<?php echo $val['Kecamatan'];?>">
                                                		<input type="hidden" name="tanggal" value="<?php echo $val['tanggal'];?>">

                                                		<?php if($val['status'] == 2){ ?>
                                                	<button class="btn btn-primary" onclick="return confirm('Approve ini ? data akan bisa dilihat admin')" type="submit" name="approve" value="approve"> Approve </button>
                                                	<button class="btn btn-danger" onclick="return confirm('Yakin batalkan data ini ? data akan dikirim ke spv 2 untuk diperbaiki')"" type="submit" name="approve" value="reject"> Batalkan/Kirim Balik Ke SPV 2 </button>
                                                  	<?php } else if($val['status'] == 3){ ?>
                                                  	Data Telah Anda Validasi 

                                                	<button class="btn btn-danger" onclick="return confirm('Yakin batalkan data ini ? data akan dikirim ke spv 2 untuk diperbaiki')"" type="submit" name="approve" value="reject"> Batalkan/Kirim Balik Ke SPV 2 </button>
                                                  	<?php } ?>
                                                </form>
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
