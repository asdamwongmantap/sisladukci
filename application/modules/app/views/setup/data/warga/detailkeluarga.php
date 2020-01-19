<!DOCTYPE html>
<html lang="en">
  <head>
		<?php
            $data['namakry'] = $this->session->userdata('fullname');
			$this->load->view('ui/headermeta.php',$data);
		?>
	
  </head>

  <body class="nav-md" progress_bar="true">
  
    <div class="container body">
      <div class="main_container">
        <?php
			$this->load->view('ui/menu.php');
			$this->load->view('ui/topmenu.php');
		?>
		<!-- page content -->
        <div class="right_col" role="main">
          <!--marquee-->
			<div class="row">
            <div class="col-md-12 col-sm-4 col-xs-12">
              <div class="x_panel">
				<marquee behavior="scroll" direction="left" scrollamount="3"><?php foreach($setting as $marquee){echo $marquee->value." ".$namakry;};?></marquee>
              </div>
            </div>
          </div>
		  <!-- end marquee-->
		  <!--form add-->
			<div class="row">
              <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Anggota Keluarga</h2>
                    <div class="clearfix"></div>
					
                  </div>
                  <div class="x_content">
				  <?php foreach ($dataeditwarga as $row) {?>
				  <form id="form-detailwarga" data-parsley-validate class="form-horizontal form-label-left" method="post">
				  
          <input type="hidden" id="CRTUSR" name="CRTUSR" class="form-control col-md-7 col-xs-12" value="<?=$this->session->userdata('userid');?>">
					   <input type="hidden" id="dtm_crt" name="dtm_crt" class="form-control col-md-7 col-xs-12" value="<?=date('Y-m-d');?>">
					
             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nik">Nomor KTP 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="wrg_nik" name="wrg_nik" required="" maxlength="16" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_nik;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nama">Nama Lengkap
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="wrg_nama" name="wrg_nama" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_nama;?>">
                        </div>
                      </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_statushubungan">Status Dalam Keluarga
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" disabled id="wrg_statushubungan" name="wrg_statushubungan" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_statushubungan;?>">
              </div>
            </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_tmpatlahir">Tempat Lahir 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="wrg_tmpatlahir" name="wrg_tmpatlahir" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_tmpatlahir;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_tgllahir">Tanggal Lahir 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!-- <input type="text" disabled id="wrg_tgllahir" name="wrg_tgllahir" required="" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_tgllahir;?>"> -->
                          <?php
                          $wrgtgllahirawal = explode("-",$row->wrg_tgllahir);
                          $wrgtgllahirtgl = $wrgtgllahirawal[2];
                          $wrgtgllahirbln = $wrgtgllahirawal[1];
                          $wrgtgllahirthn = $wrgtgllahirawal[0];
                          $wrgtgllahirformat = $wrgtgllahirtgl."/".$wrgtgllahirbln."/".$wrgtgllahirthn;
                          ?>
                          <input type="text" disabled id="wrg_tgllahir" name="wrg_tgllahir" required="" class="form-control col-md-7 col-xs-12" value="<?=$wrgtgllahirformat;?>">		
                        </div>
                      </div>
                      <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_jeniskel">Jenis Kelamin
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" disabled id="wrg_jeniskel" name="wrg_jeniskel" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_jeniskel;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_agama">Agama
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" disabled id="wrg_agama" name="wrg_agama" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_agama;?>">
              </div>
            </div>
            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_alamat">Domisili 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea disabled id="wrg_alamat" class="form-control" name="wrg_alamat" required="" maxlength="100" ><?=$row->wrg_alamat;?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_kwarganegaraan">Kewarganegaraan
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" disabled id="wrg_kwarganegaraan" name="wrg_kwarganegaraan" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_kwarganegaraan;?>">
              </div>
            </div>
					 
					  <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_statuskawin">Status Menikah
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" disabled id="wrg_statuskawin" name="wrg_statuskawin" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_statuskawin;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nohp">No. Handphone
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" disabled id="wrg_nohp" name="wrg_nohp" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_nohp;?>">
              </div>
            </div>

                      
					  
					  </form>
					  <?php
						}
						?>
                  </div>
                </div>
              </div>
			  
			  			  
            </div>
			<!--end form add-->
        </div>
        <!-- /page content -->
		<?php
			$this->load->view('ui/footermeta.php');
		?>
		
  </body>
</html>
