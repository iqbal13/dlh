

    <section class="content">
      <div class="col-md-12">
        <div class="row">
     		
     		<div class="box box-success">
     				<div class="box-header">

	        		<h3 class="text-center"> Selamat datang di Sistem TPS </h3>

     				</div>
     				<div class="box-body">

     						<form method="POST" action="<?php echo base_url() ?>volume/proses" required="required">   
     							<input type="hidden" name="aksi" value="tambah">
     						<div class="form-group">
     								<label>  Nama TPS </label>
     								<select class="form-control" name="tps" required="required">
     								<option value=""> Pilih TPS </option>
     								<?php
     								foreach($tps as $t){ ?>
     									<option value="<?php echo $t['Kode_tps'] ?>"> <?php echo $t['Nama_TPS'] ?> </option>
     								<?php } ?>

     								</select>

     						</div>

     						<div class="form-group">
     								<label>  Volume Sampah (M2) </label>
     								<input type="text" class="form-control" name="volume"  required="required">

     						</div>

     						<div class="form-group">

     								<label> Tanggal (Jika Tanggal adalah hari ini <?php echo date('d-m-Y')  ?> Maka tidak perlu diisi) </label>
     								<input type="date" name="tanggal" class="form-control"  required="required">
     						</div>
     							<button type="submit" class="btn btn-primary"> Simpan </button>
     					</form>

     				</div>

     		</div>
        </div>
      </div>
    </section>  
