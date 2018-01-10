

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center">Edit Data TPS </h3>

     				</div>
     				<div class="box-body">

     				    <form role="form" action="<?php echo base_url() ?>tps/proses" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="hidden" name="aksi" value="edit">

                                <label>Kode TPS (Kode ini tidak dapat dirubah nantinya, harap isi dengan benar)</label>
                                <input class="form-control" type="text" name="kode_tps" placeholder="Kode TPS" required="required" readonly="readonly" value="<?php echo $tps['Kode_tps']; ?>"/>
                            </div>
                         <div class="form-group">
                                <label>Nama TPS</label>
                                <input class="form-control" type="text" name="nama_tps" placeholder="Nama TPS" value="<?php echo $tps['Kode_tps']; ?>" />
                            </div>
                             <div class="form-group">
                                <label>Koordinat</label>
                                <div class="row">
                                <div class="col-lg-6">
                                     <input class="form-control" type="text" name="koordinat" placeholder="Bujur" value="<?php echo $tps['Kode_tps']; ?>"/>
                                </div>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" name="koordinat" placeholder="Koordinat" value="<?php echo $tps['Kode_tps']; ?>" />
                            </div>
                            </div>
                            </div>
                           
                            <div class="form-group">
                                <label>Penanggung Jawab</label>
                                <input class="form-control" type="text" name="penanggung_jawab" placeholder="Penanggung Jawab" value="<?php echo $tps['Kode_tps']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>No. HP</label>
                                <input class="form-control" type="tel" name="no_hp" placeholder="No HP" value="<?php echo $tps['Kode_tps']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Alamat TPS</label>
                                <textarea class="form-control" rows="3" name="alamat_tps" placeholder="Alamat TPS" value="<?php echo $tps['Kode_tps']; ?>"></textarea>
                            </div>  
                            <div class="form-group">
                            <label>Kecamatan</label>
                            <input class="form-control" type="text" name="kecamatan" value="<?php echo $_SESSION['kecamatan']; ?>" readonly="readonly">
                            </div>
                             <div class="form-group">
                            <label>Kelurahan</label>
                                <select class="form-control" name="kelurahan" id="kelurahan">
                                  <option>Choose Kelurahan</option>
                                    <?php 
                                    foreach($kelurahan as $k => $val): ?>
                                    <option value="<?=$val['nama_kelurahan'];?>"><?=$val['nama_kelurahan']; ?></option>
                                    <?php endforeach; ?>                                  
                                </select>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#kecamatan').change(function(){
                                        var kecamatan_id = $(this).val();

                                        $.ajax({
                                            type: 'POST',
                                            url: 'kelurahan.php',
                                            data: 'kec_id'+kecamatan_id,
                                            success: function(response){
                                                $('#kelurahan').html(response);
                                            }

                                        });

                                    })
                                });
                            </script>
                        <div class="form-group">
                                <label>Wilayah</label>
                                <input class="form-control" type="text" name="wilayah" value="Jakarta Barat" readonly="readonly" value="<?php echo $tps['Kode_tps']; ?>" />
                            </div>
                             <div class="form-group">
                             <label>Jenis TPS</label>
                                <select class="form-control" name="jenis_tps" >
                                  <option>- Choose -</option>
                                  <option value="Dipo">Dipo</option>
                                  <option value="Pool Gerobak">Pool Gerobak</option>
                                  <option value="Pool Container">Pool Container</option>
                                  <option value="Bak Beton">Bak Beton</option>
                                  <option value="TPS / TPS 3R">TPS / TPS 3R</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Luas Lahan</label>
                                <input class="form-control" type="text" name="luas_lahan" placeholder="Luas Lahan" />
                            </div>
                            <div class="form-group">
                                <label>Status Lahan</label>
                                <input class="form-control" type="text" name="status_lahan" placeholder="Status Lahan" />
                            </div>
                            <div class="form-group">
                                <label>Volume Sampah</label>
                                <input class="form-control" type="text" name="volume_sampah" placeholder="Volume Sampah" />
                            </div>
                            <div class="form-group">
                            <label>Sumber Sampah</label>
                                <select class="form-control" name="sumber_sampah">
                                  <option>- Choose -</option>
                                  <option value="Pemukiman Warga">Pemukiman Warga</option>
                                  <option value="Perkantoran">Perkantoran</option>
                                  <option value="Pasar">Pasar</option>
                                  <option value="Rumah Sakit">Rumah Sakit</option>
                                  <option value="Sekolah">Sekolah</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label>Atap</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="atap" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="atap" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Dinding</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="dinding" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="dinding" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Landasan</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="landasan" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="landasan" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Container</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="container" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="container" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Saluran Air Lindi</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="saluran_air" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="saluran_air" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                             <div class="form-group">
                            <label>Penampungan Air Lindi</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="penampungan_air" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="penampungan_air" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Penghijauan</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="penghijauan" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="penghijauan" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Sumber Air</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="sumber_air" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="sumber_air" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Truck</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="truk" id="inlineRadio1" onclick="view_truk(0);" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="truk" id="inlineRadio2" onclick="view_truk(1);" value="Tidak Ada"> Tidak Ada
                            </label>
                            </div>
                           
                             <div class="form-group" style="display: none;" id="tampil">
                                <label>Nama Truk</label>
                                <input class="form-control" type="text" name="nama_truk" placeholder="Nama Truk" />

                                <label>Jenis Truk</label>
                                <input class="form-control" type="text" name="jenis_truk" placeholder="Jenis Truk" />
                        
                                <label>Nomer Pintu Truk</label>
                                <input class="form-control" type="text" name="nomer_truk" placeholder="Nomer Pintu Truk" />
                            </div>
                             <script type="text/javascript">
                               function view_truk(param)
                                    {
                                    if(param==0)
                                    document.getElementById("tampil").style.display = 'block';
                                    else
                                    document.getElementById("tampil").style.display = 'none';
                                    }
                            </script>
                            <div class="form-group">
                            <label>Alat Berat</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="alat_berat" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="alat_berat" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Composting</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="composting" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="composting" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Pencacah Organik</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="pencacah_organik" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="pencacah_organik" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Pencacah Anorganik</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="pencacah_anorganik" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="pencacah_anorganik" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Pengayak</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="pengayak" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="pengayak" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                            <div class="form-group">
                            <label>Alat Press</label> <br>
                            <label class="radio-inline">
                            <input type="radio" name="alat_press" id="inlineRadio1" value="ada"> Ada
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="alat_press" id="inlineRadio2" value="tidak ada"> Tidak Ada
                            </label>
                            </div>
                             <div class="form-group">
                            <label>Jam Pengumpulan</label><br/>
                            <i style="color: #e74c3c">Penulisan Jam</i>
                                <input class="form-control" type="text" name="jam_pengumpulan" placeholder="Jam Pengumpulan" />
                            </div>
                             <div class="form-group">
                            <label>Jam Pengakutan</label><br/>
                             <i style="color: #e74c3c">Penulisan Jam</i>
                                <input class="form-control" type="text" name="jam_pengangkutan" placeholder="Jam Pengakutan" />
                            </div>
                            <div class="form-group">
                                <label>Permasalahan</label>
                                 <textarea class="form-control" rows="3" name="permasalahan" placeholder="Permasalahan"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                 <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Foto 1</label><br/>
                                <input type="file" name="file" />
                            </div> 
                             <div class="form-group">
                                <label>Foto 2</label><br/>
                                <input type="file" name="file2" />
                            </div> 
                             <div class="form-group">
                                <label>Foto 3</label><br/>
                                <input type="file" name="file3" />
                            </div> 
                            <button type="submit" name="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>

     				</div>

     		</div>
        </div>
      </div>
    </section>  
