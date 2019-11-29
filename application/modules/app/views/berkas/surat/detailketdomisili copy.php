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
				<marquee behavior="scroll" direction="left" scrollamount="3"><?php foreach($setting as $marquee){echo $marquee->value;};?></marquee>
              </div>
            </div>
          </div>
		  <!-- end marquee-->
		  <!--form add-->
			<div class="row">
              <div class="col-md-12 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Kategori</h2>
                    <div class="clearfix"></div>
					
                  </div>
                  <div class="x_content">
				  <?php foreach ($dataeditkategori as $row) {?>
				  <form id="form-detailkategori" data-parsley-validate class="form-horizontal form-label-left" method="post">
				  
					   <input type="hidden" id="CRTUSR" name="CRTUSR" class="form-control col-md-7 col-xs-12" value="<?=$this->session->userdata('userid');?>">
					
             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kat_id">ID
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="kat_id" name="kat_id" required="" maxlength="16" class="form-control col-md-7 col-xs-12" value="<?=$row->kat_id;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kat_nama">Nama 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled id="kat_nama" name="kat_nama" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->kat_nama;?>">
                        </div>
                      </div>
					  
					 
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kat_desc">Desc 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea id="kat_desc" disabled class="form-control" name="kat_desc" required="" maxlength="100" ><?=$row->kat_desc;?></textarea>
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
