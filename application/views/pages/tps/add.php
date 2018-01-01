

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

                                  <?php foreach($field as $f => $val){ ?>

                                  <div class="form-group">
                                    <label> <?php echo str_replace('_',' ',$val['Field']); ?> </label>
                                    <input type="text" required="required" name="<?php echo $val['Field'];?>" class="form-control">

                                  </div>
                                  <?php if($f == 17){
                                    echo "</div><div class='col-md-6'>";
                                  }
                                  } ?>


                                </div>
     					
     							<button type="submit" class="btn btn-primary"> Simpan </button>
     					</form>

     				</div>

     		</div>
        </div>
      </div>
    </section>  
