

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center">Tambah Data TPS </h3>

     				</div>
     				<div class="box-body">

     						<form method="POST" action="<?php echo base_url() ?>tps/proses" required="required">   
     							<input type="hidden" name="aksi" value="tambah">

                                <div class="col-md-6">

     						<div class="form-group">
     								<label> Kode TPS </label>
     							<input type="text" name="kode_tps" class="form-control">
     						</div>

                                <div class="form-group">
                                    <label> Kode TPS </label>
                                <input type="text" name="kode_tps" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Nama TPS </label>
                                <input type="text" name="kode_tps" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Koordinat Lintang</label>
                                <input type="text" name="kode_tps" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Koordinat Bujur </label>
                                <input type="text" name="kode_tps" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Penanggung Jawab </label>
                                <input type="text" name="kode_tps" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> No HP Penanggung Jawab</label>
                                <input type="text" name="kode_tps" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Alamat TPS </label>
                                <input type="text" name="kode_tps" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Kecamatan </label>
                                    <select class="form-control" name="kecamatan" required="required" id="kecamatan">
                                      <option value=""> Pilih Kecamatan</option>
                                      <?php foreach($kecamatan as $k): ?>
                                        <option value="<?php echo $k['nama_kecamatan'] ?>"> <?php echo $k['nama_kecamatan']; ?> </option>
                                      <?php endforeach; ?>
                                    </select>


                            </div>


                              <div class="form-group">
                                    <label> Kelurahan </label>
                                <input type="text" name="kode_tps" class="form-control">
                            </div>

                        </div>

                        <div class="col-md-6">

                                <div class="form-group">
                                    <label> Wilayah </label>
                                <input type="text" name="Wilayah" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Jenis TPS </label>
                                <input type="text" name="Jenis_TPS" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Status Lahan </label>
                                <input type="text" name="Status_Lahan" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Sumber Sampah </label>
                                <input type="text" name="Sumber_Sampah" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Atap </label>
                                <input type="text" name="Atap" class="form-control">
                            </div>

                                <div class="form-group">
                                    <label> Dinding </label>
                                <input type="text" name="Dinding" class="form-control">
                            </div>
                                <div class="form-group">
                                    <label> Landasan </label>
                                <input type="text" name="Landasan" class="form-control">
                            </div>

                             <div class="form-group">
                                    <label> Container </label>
                                <input type="text" name="Container" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Saluran Air Lindi </label>
                                <input type="text" name="Saluran_Air_Lindi" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Penampungan air Lindi </label>
                                <input type="text" name="Penampungan_Air_Lindi" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Penghijauan </label>
                                <input type="text" name="Penghijauan" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Sumber Air </label>
                                <input type="text" name="Sumber_Air" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Truk </label>
                                <input type="text" name="Truk" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Jenis Truk </label>
                                <input type="text" name="jenis_truk" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Alat Berat </label>
                                <input type="text" name="Alat_Berat" class="form-control">
                            </div>



 <div class="form-group">
                                    <label> Komposting </label>
                                <input type="text" name="Komposting" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Pencatcah Organik </label>
                                <input type="text" name="Pencacah_Organik" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Pencacah Anorganik </label>
                                <input type="text" name="Pencacah_Anorganik" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Pengayak </label>
                                <input type="text" name="Pengayak" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Alat Press </label>
                                <input type="text" name="Alat_Press" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Jam Pengumpulan </label>
                                <input type="text" name="Jam_Pengangkutan" class="form-control">
                            </div>


 <div class="form-group">
                                    <label> Jam Pengangkutan </label>
                                <input type="text" name="Jam_Pengangkutan" class="form-control">
                            </div>

 <div class="form-group">
                                    <label> Permasalahan </label>
                                <input type="text" name="Permasalahan" class="form-control">
                            </div>

 <div class="form-group">
                                    <label> Keterangan </label>
                                <input type="text" name="Keterangan" class="form-control">
                            </div>

 <div class="form-group">
                                    <label> Foto TPS </label>
                                <input type="text" name="foto_tps" class="form-control">
                            </div>

 <div class="form-group">
                                    <label> Luas Lahan </label>
                                <input type="text" name="luas_lahan" class="form-control">
                            </div>

 <div class="form-group">
                                    <label> Nomer Pintu Truk </label>
                                <input type="text" name="nomer_pintu_truk" class="form-control">
                            </div>



                        </div>
     					
     							<button type="submit" class="btn btn-primary"> Simpan </button>
     					</form>

     				</div>

     		</div>
        </div>
      </div>
    </section>  
