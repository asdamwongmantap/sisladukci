<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border:0px solid black;">
              <a href="#" class="site_title">SISLADUK</a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url();?>assets/prod/images/img.jpg" alt="user" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$namakry;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
			
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              <?php if ($this->session->userdata('usergroupid') =='1') {?>
                    <ul class="nav side-menu">
                    <!-- <h3>General</h3> -->
               <li><a href="<?=base_url();?>app/main/dashboard"><i class="fa fa-home"></i> Beranda </a></li>
               <h3>Setup</h3>
               <li>
               <a href="#"><i class="fa fa-gear"></i> Master Data Penduduk </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/data/warga/listkepalakeluarga">Data Kepala Keluarga</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/warga/listallwarga">Data Keseluruhan Penduduk</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/warga/listpindahwarga">Data Perpindahan Penduduk</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/warga/listmeninggalwarga">Data Kematian Penduduk</a>
                </li>
                </ul>
                </li>
    
                <!-- <h3>Berkas</h3> -->
                
               <li>
               <a href="#"><i class="fa fa-file"></i> Surat </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/surat/listketdomisili">Surat Pengantar Domisili</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/listkuasa">Surat Kuasa</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/listizinmenikah">Surat Izin Menikah</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/listsuratpengantar">Surat Pengantar Biasa</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/listsuratkematian">Surat Kematian</a>
                </li>
                </ul>
                </li>
                <!-- <h3>Laporan</h3> -->
                <li>
                  <a href="<?=base_url();?>app/surat/mohonktp"><i class="fa fa-calculator"></i>Keuangan</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/mohonktp"><i class="fa fa-file"></i>SMS Blast</a>
                </li>
                <!-- <h3>Laporan</h3> -->
              <li>
               <a href="#"><i class="fa fa-file"></i>Report </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/laporan/warga">Report Data Penduduk</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Report Data Surat</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Report Data Keuangan</a>
                </li>
                </ul>
                </li>
              <h3>Others</h3>
              <li><a href="<?=base_url();?>app/login_c/logout"><i class="fa fa-sign-out"></i> Logout </a></li>
              
                    </ul>
                 <?php }
                  else if ($this->session->userdata('usergroupid') =='2'){?>
                    <ul class="nav side-menu">
                    <h3>General</h3>
               <li><a href="<?=base_url();?>app/main/dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
               <li>
                  <a href="<?=base_url();?>app/surat/mohonktp"><i class="fa fa-calculator"></i>Keuangan</a>
                </li>
              <li>
               <a href="#"><i class="fa fa-file"></i>Report </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/laporan/warga">Report Data Penduduk</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Report Data Surat</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Report Data Keuangan</a>
                </li>
                </ul>
                </li>
              <li><a href="<?=base_url();?>app/login_c/logout"><i class="fa fa-sign-out"></i> Logout </a></li>
              
                    </ul>
                   <?php }
                    else if ($this->session->userdata('usergroupid')=='3'){?>
                      <ul class="nav side-menu">
                      <li><a href="<?=base_url();?>app/main/dashboard"><i class="fa fa-home"></i> Beranda </a></li>
               <h3>Setup</h3>
               <li>
               <a href="#"><i class="fa fa-gear"></i> Master Data Penduduk </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/data/warga/listkepalakeluarga">Data Kepala Keluarga</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/warga/listallwarga">Data Keseluruhan Penduduk</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/warga/listpindahwarga">Data Perpindahan Penduduk</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/warga/listmeninggalwarga">Data Kematian Penduduk</a>
                </li>
                </ul>
                </li>
    
                <!-- <h3>Berkas</h3> -->
                
               <li>
               <a href="#"><i class="fa fa-file"></i> Surat </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/surat/listketdomisili">Surat Pengantar Domisili</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/listkuasa">Surat Kuasa</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/listizinmenikah">Surat Izin Menikah</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/listsuratpengantar">Surat Pengantar Biasa</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/listsuratkematian">Surat Kematian</a>
                </li>
                </ul>
                </li>
                <!-- <h3>Laporan</h3> -->
                <li>
                  <a href="<?=base_url();?>app/surat/mohonktp"><i class="fa fa-calculator"></i>Keuangan</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/mohonktp"><i class="fa fa-file"></i>SMS Blast</a>
                </li>
                <!-- <h3>Laporan</h3> -->
              <li>
               <a href="#"><i class="fa fa-file"></i>Report </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/laporan/warga">Report Data Penduduk</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Report Data Surat</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Report Data Keuangan</a>
                </li>
                </ul>
                </li>
              <h3>Others</h3>
              <li><a href="<?=base_url();?>app/login_c/logout"><i class="fa fa-sign-out"></i> Logout </a></li>
              
                    </ul>
                    <?php  }
                      else if ($this->session->userdata('usergroupid')=='4'){?>
                        <ul class="nav side-menu">
                        <li>
                  <a href="<?=base_url();?>app/surat/mohonktp"><i class="fa fa-calculator"></i>Keuangan</a>
                </li>
                
                <!-- <h3>Laporan</h3> -->
              <li>
               <a href="#"><i class="fa fa-file"></i>Report </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/laporan/warga">Report Data Penduduk</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Report Data Surat</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Report Data Keuangan</a>
                </li>
                </ul>
                </li>
              <h3>Others</h3>
              <li><a href="<?=base_url();?>app/login_c/logout"><i class="fa fa-sign-out"></i> Logout </a></li>
              
                    </ul>
                    <?php    }
                        else {?>
                          <ul class="nav side-menu">
                    <h3>General</h3>
               <li><a href="<?=base_url();?>app/main/dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
              
              <h3>Others</h3>
              <li><a href="<?=base_url();?>app/login_c/logout"><i class="fa fa-sign-out"></i> Logout </a></li>
              
                    </ul>
                      <?php    }
                  
              ?>
                
                
				
              </div>
              
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>