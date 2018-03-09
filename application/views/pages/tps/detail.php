

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center"> Detail TPS </h3>

     				</div>
     				<div class="box-body">

     					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php foreach($tps as $k => $val){
   ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="a-<?php echo $k ?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $k ?>" aria-expanded="true" aria-controls="collapseOne">
        		<?php echo $val['Nama_TPS'] ?> 
        </a>
      </h4>
    </div>
    <div id="collapse-<?php echo $k ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
    <table class="table table-striped"> <tr>    
                     <tr><td>Kode TPS   </td><td> : </td> <td>                      <?php echo $val['Kode_tps'];?></td></tr>
                     <tr><td>Nama TPS   </td><td> : </td> <td>                      <?php echo $val['Nama_TPS'];?></td></tr>
                     <tr><td>Koordinat Lintang  </td><td> : </td> <td>                      <?php echo $val['Kordinat_Lintang'];?></td></tr>
                     <tr><td>Koordinat Bujur    </td><td> : </td> <td>                      <?php echo $val['Kordinat_Bujur'];?></td></tr>
                     <tr><td>Penanggung Jawab   </td><td> : </td> <td>                      <?php echo $val['Penanggung_Jawab'];?></td></tr>
                     <tr><td>No.HP  </td><td> : </td> <td>                      <?php echo $val['No_HP'];?></td></tr>
                     <tr><td>Alamat TPS </td><td> : </td> <td>                      <?php echo $val['Alamat_TPS'];?></td></tr>
                     <tr><td>Kelurahan  </td><td> : </td> <td>                      <?php echo $val['Kelurahan'];?></td></tr>
                     <tr><td>Kecamatan  </td><td> : </td> <td>                      <?php echo $val['Kecamatan'];?></td></tr>
                     <tr><td>Wilayah    </td><td> : </td> <td>                      <?php echo $val['Wilayah'];?></td></tr>
                     <tr><td>Jenis TPS  </td><td> : </td> <td>                      <?php echo $val['Jenis_TPS'];?></td></tr>
                     <tr><td>Luas Lahan(m2) </td><td> : </td> <td>                      <?php echo $val['Luas_lahan'];?></td></tr>
                     <tr><td>Status Lahan   </td><td> : </td> <td>                      <?php echo $val['Status_Lahan'];?></td></tr>
                     <tr><td>Sumber Sampah  </td><td> : </td> <td>                      <?php echo $val['Sumber_Sampah'];?></td></tr>
                     <tr><td>Atap   </td><td> : </td> <td>                      <?php echo $val['Atap'];?></td></tr>
                     <tr><td>Dinding    </td><td> : </td> <td>                      <?php echo $val['Dinding'];?></td></tr>
                     <tr><td>Landasan   </td><td> : </td> <td>                      <?php echo $val['Landasan'];?></td></tr>
                     <tr><td>Container  </td><td> : </td> <td>                      <?php echo $val['Container'];?></td></tr>
                     <tr><td>Saluran Air Lindi  </td><td> : </td> <td>                      <?php echo $val['Saluran_Air_Lindi'];?></td></tr>
                     <tr><td>Penampungan Air Lindi  </td><td> : </td> <td>                      <?php echo $val['Penampungan_Air_Lindi'];?></td></tr>
                     <tr><td>Penghijauan    </td><td> : </td> <td>                      <?php echo $val['Penghijauan'];?></td></tr>
                     <tr><td> Sumber Air </td> <td> : </td> <td> <?php echo $val['Sumber_Air']; ?> </td> </tr>
                     <tr><td> TRUK </td> <td> : </td> <td> <?php echo $val['Truk']; ?> </td> </tr>
                     <tr><td> Jenis Truk </td> <td> : </td> <td> <?php echo $val['jenis_truk']; ?> </td> </tr>
                     <tr><td> Alat Berat </td> <td> : </td> <td> <?php echo $val['Alat_Berat']; ?> </td> </tr>
                     <tr><td> Komposting </td> <td> : </td> <td> <?php echo $val['Komposting']; ?> </td> </tr>
                     <tr><td> Pencacah Organik </td> <td> : </td> <td> <?php echo $val['Pencacah_Organik']; ?> </td> </tr>
                     <tr><td> Pencacah Anorganik </td> <td> : </td> <td> <?php echo $val['Pencacah_Anorganik']; ?> </td> </tr>
                     <tr><td> Pengayak </td> <td> : </td> <td> <?php echo $val['Pengayak']; ?> </td> </tr>
                     <tr><td> Alat Press </td> <td> : </td> <td> <?php echo $val['Alat_Press']; ?> </td> </tr>
                     <tr><td> Jam Pengumpulan </td> <td> : </td> <td> <?php echo $val['Jam_Pengumpulan']; ?> </td> </tr>
                     <tr><td> Jam Pengangkutan </td> <td> : </td> <td> <?php echo $val['Jam_Pengangkutan']; ?> </td> </tr>
                     <tr><td> Permasalahan </td> <td> : </td> <td> <?php echo $val['Permasalahan']; ?> </td> </tr>
                     <tr><td> Keterangan </td> <td> : </td> <td> <?php echo $val['Keterangan']; ?> </td> </tr>
                     <tr><td> Luas Lahan </td> <td> : </td> <td> <?php echo $val['Luas_lahan']; ?> </td> </tr>

                        
                                          <tr><td> Nomer Pintu Truk </td> <td> : </td> <td> <?php echo $val['nomer_pintu_truk']; ?> </td> </tr>

                     <tr><td> FOTO tps 1 </td> <td> : </td> <td> <?php if($val['Foto_TPS'] != ''){ ?>
                        <img src="<?php echo base_url() ?>foto_tps/<?php echo trim($val['Foto_TPS']); ?>" class="img-responsive">
                        <?php  } ?>

                     </td> </tr>

                       <tr><td> FOTO tps 2 </td> <td> : </td> <td> <?php if($val['foto_tps2'] != ''){ ?>
                        <img src="<?php echo base_url() ?>foto_tps/<?php echo trim($val['foto_tps2']); ?>" class="img-responsive">
                        <?php  } ?>

                     </td> </tr>


                        <tr><td> FOTO tps 3 </td> <td> : </td> <td> <?php if($val['foto_tps3'] != ''){ ?>
                        <img src="<?php echo base_url() ?>foto_tps/<?php echo trim($val['foto_tps3']); ?>" class="img-responsive">
                        <?php  } ?>

                     </td> </tr>



                            </td>
                        </tr>
                     </tr>
                 </table>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
     				
     				</div>

     		</div>
        </div>
      </div>
    </section>  
