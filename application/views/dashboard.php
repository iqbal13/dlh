<?php $this->load->view('partial/head'); ?>

<style type="text/css">
  body {
    overflow: auto;
  }
</style>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php $this->load->view('partial/header'); ?>
 <?php $this->load->view('partial/sidebar'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

     <section class="content-header">
      <h1>
      
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>
      <div>
          <?php echo @$this->session->flashdata('item') ?> 
      </div>

   	<?php 
   	if(@$content){
   		$this->load->view($content); 
   	}else{
   		$this->load->view('partial/dummy_home');
   	}
   	?>	

  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('partial/footer') ;?>
</div>
<!-- ./wrapper -->
<?php $this->load->view('partial/js_under'); ?>
  <?php 
    if(@$js_under){
      $this->load->view($js_under); 
    }else{
    }
    ?>  

<script>
        function pilihtahun(a){

                if(a == ''){

                }else{
                        $.ajax({
                            type:"POST",
                            url:"<?php echo base_url() ?>ajax/pilihtahun",
                            data:"tahun="+a,
                            success:function(dt){
                                alert('Anda Memilih Tahun Laporan '+a);
                                window.location.reload();
                            }
                        })

                }
        }
</script>


</body>
</html>

