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
        <!--  <li>
          <a href="<?php echo base_url() ?>volume/validasi">
            <i class="fa fa-dashboard"></i> <span>Data Volume</span>
          </a>
        </li> -->

      <?php if($this->session->userdata('level') == 'Operator'){?> 
              <li><a href="<?php echo base_url() ?>volume/add"><span class="fa fa-download"> </span> Input Data Volume </a> </li>
         <li>
          <a href="<?php echo base_url() ?>tps/add">
            <i class="fa fa-dashboard"></i> <span>Input Data TPS</span>
          </a>
        </li>       
      <?php }else if($this->session->userdata('level') == 'Supervisor1'){ ?>
              <li><a href="<?php echo base_url() ?>volume"> Data Volume </a> </li>
              <li><a href="<?php echo base_url() ?>tps"> Manajemen TPS  </a> </li>


      <?php }else if($this->session->userdata('level') == 'Supervisor2'){ ?>
                    <li><a href="<?php echo base_url() ?>volume/datavolumeall"> Data Volume </a> </li>
              <li><a href="<?php echo base_url() ?>tps"> Manajemen TPS  </a> </li>


      <?php } else if($this->session->userdata('level') == 'Admin'){ ?>
       <li><a href="<?php echo base_url() ?>volume/datavolumeall"> Data Volume </a> </li>
              <li><a href="<?php echo base_url() ?>tps"> Manajemen TPS  </a> </li>
              <li><a href="<?php echo base_url() ?>user"> Manajemen User  </a> </li>

<?php  } else{ }  ?>
      <!--   <li>
          <a href="<?php echo base_url() ?>user/index">
            <i class="fa fa-dashboard"></i> <span>Manajemen User</span>
          </a>
        </li> -->
      <?php if($_SESSION['level'] != 'Operator'){ ?>
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
            if($this->session->userdata('level') == 'Admin'){ ?>

                <li><a href="<?php echo base_url()?>laporan/tps_perkota"> Laporan TPS Seluruh </a> </li>
    <li><a href="<?php echo base_url() ?>laporan/volume/kota"> Laporan Volume Sampah <br /> Seluruh Wilayah </a> </li>


<?php
            }else
            if($this->session->userdata('level') == 'Supervisor2'){ 
              $kota = $this->session->userdata('kota');
                ?>
                   <li><a href="<?php echo base_url()?>laporan/tps_perkota"> Laporan TPS Perkecamatan </a> </li>
    <li><a href="<?php echo base_url() ?>laporan/laporan_volume/bulanan/1/kota"> Laporan Volume Sampah <br /> Wilayah </a> </li>
<?php 
    }else{ ?>
    <li><a href="<?php echo base_url() ?>laporan/tps_perkecamatan"> Laporan TPS  </a> </li>
    <li><a href="<?php echo base_url() ?>laporan/laporan_volume"> Laporan Volume Sampah <br />Per Kecamatan </a> </li>

    <?php }            
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