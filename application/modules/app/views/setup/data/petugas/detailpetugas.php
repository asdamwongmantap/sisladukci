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
                    <h2>Detail Petugas</h2>
                    <div class="clearfix"></div>
					
                  </div>
                  <div class="x_content">
				  <?php foreach ($dataeditpetugas as $row) {?>
				  <form id="form-detailpetugas" data-parsley-validate class="form-horizontal form-label-left" method="post">
				  
					   <input type="hidden" id="CRTUSR" name="CRTUSR" class="form-control col-md-7 col-xs-12" value="<?=$this->session->userdata('userid');?>">
					
             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ptg_nip">NIP
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="ptg_nip" name="ptg_nip" required="" maxlength="16" class="form-control col-md-7 col-xs-12" value="<?=$row->ptg_nip;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ptg_nama">Nama 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="ptg_nama" name="ptg_nama" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->ptg_nama;?>">
                        </div>
                      </div>
					  
					 
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ptg_alamat">Alamat 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea id="ptg_alamat" disabled class="form-control" name="ptg_alamat" required="" maxlength="100" ><?=$row->ptg_alamat;?></textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ptg_email">Email 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="ptg_email" name="ptg_email" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->ptg_email;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ptg_nohp">No. Handphone 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="ptg_nohp" name="ptg_nohp" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->ptg_nohp;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ptg_posisi">Posisi 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="ptg_posisi" name="ptg_posisi" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->ptg_posisi;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ptg_username">Username 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="ptg_username" name="ptg_username" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->ptg_username;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ptg_password">Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" disabled id="ptg_password" name="ptg_password" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->ptg_password;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ptg_usergroupid">Usergroup 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="ptg_usergroupid" name="ptg_usergroupid" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->ptg_usergroupid;?>">
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
