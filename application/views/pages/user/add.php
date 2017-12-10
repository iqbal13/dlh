

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center"> Tambah User </h3>

     				</div>
     				<div class="box-body">

     						<form method="POST" action="<?php echo base_url() ?>user/proses" required="required">   
     							<input type="hidden" name="aksi" value="tambah">
     						<div class="form-group">
     								<label>  Nama Lengkap </label>
     							    <input type="text" name="nama_user" class="form-control">

     						</div>

     						<div class="form-group">
     								<label>  Username </label>
     								<input type="text" class="form-control" name="username"  required="required">

     						</div>
                                <div class="form-group">
                                    <label>  Password </label>
                                    <input type="text" class="form-control" name="password"  required="required">

                            </div>
                                <div class="form-group">
                                    <label>  Kota </label>
     <select class="form-control" name="kota" id="kota">
                    <option> Pilih Kota </option>
                    <?php 
                    foreach($kota as $k){ ?>
                        <option value="<?php echo $k['kota'] ?>"> <?php echo $k['kota'] ?> </option>

                    <?php } ?>

                                        </select>

                            </div>
                                <div class="form-group">
                                    <label>  Kecamatan </label>
     <select class="form-control" name="kecamatan" id="kecamatan">
        <option> Pilih Kota  DUlu </option>
                                        </select>

                            </div>

                                <div class="form-group">
                                    <label>  Level </label>
                                        <select class="form-control" name="level">
                                                <option value="Admin"> Admin </option>
                                                <option value="Supervisor1"> Supervisor 1 </option>
                                                <option value="Supervisor2"> Supervisor 1 </option>
                                                <option value="Operator"> Operator </option>

                                        </select>

                            </div>
     							<button type="submit" class="btn btn-primary"> Simpan </button>
     					</form>

     				</div>

     		</div>
        </div>
      </div>
    </section>  
