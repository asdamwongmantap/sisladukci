<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border:0px solid black;">
              <a href="#" class="site_title">WM-DUKCAPILSYS</a>
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
                    <h3>General</h3>
               <li><a href="<?=base_url();?>app/main/dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
               <h3>Setup</h3>
               <li>
               <a href="#"><i class="fa fa-gear"></i> Data </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/data/warga/listwarga">Warga</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/petugas/listpetugas">Petugas</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/kelurahan/listkelurahan">Kelurahan</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/kategori/listkategori">Kategori</a>
                </li>
                </ul>
                </li>
    
                <h3>Berkas</h3>
                
               <li>
               <a href="#"><i class="fa fa-calculator"></i> Surat </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/surat/numpangnikah">Menumpang Menikah</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/mohonkk">Permohonan KK</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/mohonskck">Permohonan SKCK</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/mohondomisili">Permohonan Domisili</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/mohonktp">Permohonan KTP</a>
                </li>
                </ul>
                </li>
                <h3>Laporan</h3>
              <li>
               <a href="#"><i class="fa fa-file"></i>Laporan </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/laporan/warga">Warga</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Keuangan</a>
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
              
    
                
                <h3>Laporan</h3>
              <li>
               <a href="#"><i class="fa fa-file"></i>Laporan </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/laporan/warga">Warga</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Keuangan</a>
                </li>
                
                </ul>
                </li>
              <h3>Others</h3>
              <li><a href="<?=base_url();?>app/login_c/logout"><i class="fa fa-sign-out"></i> Logout </a></li>
              
                    </ul>
                   <?php }
                    else if ($this->session->userdata('usergroupid')=='3'){?>
                      <ul class="nav side-menu">
                    <h3>General</h3>
               <li><a href="<?=base_url();?>app/main/dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
               <h3>Setup</h3>
               <li>
               <a href="#"><i class="fa fa-gear"></i> Data </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/data/warga/listwarga">Warga</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/petugas/listpetugas">Petugas</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/kelurahan/listkelurahan">Kelurahan</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/data/kategori/listkategori">Kategori</a>
                </li>
                </ul>
                </li>
    
                <h3>Berkas</h3>
                
               <li>
               <a href="#"><i class="fa fa-calculator"></i> Surat </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/surat/numpangnikah">Menumpang Menikah</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/mohonkk">Permohonan KK</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/mohonskck">Permohonan SKCK</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/mohondomisili">Permohonan Domisili</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/surat/mohonktp">Permohonan KTP</a>
                </li>
                </ul>
                </li>
                <h3>Laporan</h3>
              <li>
               <a href="#"><i class="fa fa-file"></i>Laporan </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/laporan/warga">Warga</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Keuangan</a>
                </li>
                
                </ul>
                </li>
              <h3>Others</h3>
              <li><a href="<?=base_url();?>app/login_c/logout"><i class="fa fa-sign-out"></i> Logout </a></li>
              
                    </ul>
                    <?php  }
                      else if ($this->session->userdata('usergroupid')=='4'){?>
                        <ul class="nav side-menu">
                    <h3>General</h3>
               <li><a href="<?=base_url();?>app/main/dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
               
                <h3>Laporan</h3>
              <li>
               <a href="#"><i class="fa fa-file"></i>Laporan </a>
               
               <ul class="nav child_menu">
                <li>
                  <a href="<?=base_url();?>app/laporan/warga">Warga</a>
                </li>
                <li>
                  <a href="<?=base_url();?>app/laporan/keuangan">Keuangan</a>
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