  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
          <img src="<?php echo base_url() ?>img/logo.jpg" class="text-center" alt="User Image" style="height:50px;" >
      </div>
      <!-- search form -->
        <div class="col-md-12 form-group">
  
        
        </div>
        <div class="clearfix"> </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Input Volume</span>
           <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="<?php echo base_url() ?>volume/add"> Tambah Volume </a> </li>
              <li><a href="<?php echo base_url() ?>volume"> Data Volume </a> </li>
          </ul>
        </li>
       
        <li>
          <a href="<?php echo base_url() ?>user/index">
            <i class="fa fa-dashboard"></i> <span>Manajemen User</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>tps/index">
            <i class="fa fa-dashboard"></i> <span>Manajemen Data TPS</span>
          </a>
        </li>       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php 

            if($this->session->userdata('level') == 'Supervisor1'){ 
              $kota = $this->session->userdata('kota');
              echo $kota;

                $kotanya = $this->db->get_where('master_kota',array('kota' => $kota))->row_array();

            $kecamatan = $this->db->get_where('master_kecamatan',array('id_kota' => $kotanya['id_kota']))->result_array();
              foreach($kecamatan as $k){  ?>
                <li> <a href="<?php echo base_url() ?>laporan/index/<?php echo str_replace(' ','-',$k['nama_kecamatan']) ?>"> <?php echo $k['nama_kecamatan'] ?> </a>


<?php 
              }
 } ?>
          </ul>
        </li>
          <li>
          <a href="<?php echo base_url() ?>logout">
            <i class="fa fa-dashboard"></i> <span>Logout</span>
          </a>
        </li>
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>