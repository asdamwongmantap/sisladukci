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
                    <h2>Form Ubah Data Warga</h2>
                    <div class="clearfix"></div>
					
                  </div>
                  <div class="x_content">
				  <?php foreach ($dataeditwarga as $row) {?>
				  <form id="form-editwarga" data-parsley-validate class="form-horizontal form-label-left" method="post">
				  
				  <input type="hidden" id="CRTUSR" name="CRTUSR" class="form-control col-md-7 col-xs-12" value="<?=$this->session->userdata('userid');?>">
					   <input type="hidden" id="dtm_crt" name="dtm_crt" class="form-control col-md-7 col-xs-12" value="<?=date('Y-m-d');?>">
					   <input type="hidden" id="wrg_nokk" name="wrg_nokk" required="" maxlength="16" class="form-control col-md-4 col-xs-12" value="<?=$row->wrg_nokk;?>">
             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nik">No. KTP 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrg_nik" name="wrg_nik" required="" maxlength="16" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_nik;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nama">Nama Lengkap
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrg_nama" name="wrg_nama" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_nama;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_statushubungan">Status Dalam Keluarga 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_statushubungan" name="wrg_statushubungan">
							<option value='Kepala Keluarga' <?=(($row->wrg_statushubungan == "Kepala Keluarga") ? "selected" : "")?>>Kepala Keluarga</option>
							<option value='Istri' <?=(($row->wrg_statushubungan == "Istri") ? "selected" : "")?>>Istri</option>
							<option value='Anak' <?=(($row->wrg_statushubungan == "Anak") ? "selected" : "")?>>Anak</option>
							
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_tmpatlahir">Tempat Lahir 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrg_tmpatlahir" name="wrg_tmpatlahir" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_tmpatlahir;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_tgllahir">Tanggal Lahir 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<?php
							$wrgtgllahirawal = explode("-",$row->wrg_tgllahir);
							$wrgtgllahirtgl = $wrgtgllahirawal[2];
							$wrgtgllahirbln = $wrgtgllahirawal[1];
							$wrgtgllahirthn = $wrgtgllahirawal[0];
							$wrgtgllahirformat = $wrgtgllahirtgl."/".$wrgtgllahirbln."/".$wrgtgllahirthn;
							?>				  
		  				<!-- <input type="date" id="wrg_tgllahir" name="wrg_tgllahir" required="" class="form-control col-md-7 col-xs-12"> -->
						  <div class="input-group date" id="myDatepicker2">
							<input type="text" class="form-control" id="wrg_tgllahir" name="wrg_tgllahir" value="<?=$wrgtgllahirformat;?>"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
							</div>		
					</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_jeniskel">Jenis Kelamin 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_jeniskel" name="wrg_jeniskel">
							<option value="Laki-Laki" <?=(($row->wrg_jeniskel == "Laki-Laki") ? "selected" : "")?>>Laki-Laki</option>
							<option value="Perempuan" <?=(($row->wrg_jeniskel == "Perempuan") ? "selected" : "")?>>Perempuan</option>
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_agama">Agama 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_agama" name="wrg_agama">
							<option value="Islam" <?=(($row->wrg_jeniskel == "Islam") ? "selected" : "")?>>Islam</option>
							<option value="Kristen" <?=(($row->wrg_jeniskel == "Kristen") ? "selected" : "")?>>Kristen</option>
							<option value="Hindu" <?=(($row->wrg_jeniskel == "Hindu") ? "selected" : "")?>>Hindu</option>
							<option value="Budha" <?=(($row->wrg_jeniskel == "Budha") ? "selected" : "")?>>Budha</option>
							<option value="Konghucu" <?=(($row->wrg_jeniskel == "Konghucu") ? "selected" : "")?>>Konghucu</option>
							<option value="Protestan" <?=(($row->wrg_jeniskel == "Protestan") ? "selected" : "")?>>Protestan</option>
						  </select>
                        </div>
                      </div>
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_alamat">Domisili 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea id="wrg_alamat" class="form-control" name="wrg_alamat" required="" maxlength="100" ><?=$row->wrg_nik;?></textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_kwarganegaraan">Kewarganegaraan 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_kwarganegaraan" name="wrg_kwarganegaraan">
							<option value="WNI" <?=(($row->wrg_kwarganegaraan == "WNI") ? "selected" : "")?>>WNI</option>
							<option value="WNA" <?=(($row->wrg_kwarganegaraan == "WNA") ? "selected" : "")?>>WNA</option>
						  </select>
                        </div>
                      </div>
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_statuskawin">Status Menikah 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_statuskawin" name="wrg_statuskawin">
							<option value="Lajang" <?=(($row->wrg_statuskawin == "Lajang") ? "selected" : "")?>>Lajang</option>
							<option value="Menikah" <?=(($row->wrg_statuskawin == "Menikah") ? "selected" : "")?>>Menikah</option>
							<option value="Duda/Janda" <?=(($row->wrg_statuskawin == "Duda/Janda") ? "selected" : "")?>>Duda/Janda</option>
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nohp">No. Handphone
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="wrg_nohp" name="wrg_nohp" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_nohp;?>">
						</div>
						</div>
					  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" id="savebtn">Simpan</button>
						  
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
		<script type="text/javascript">
			//proses add
			$('#myDatepicker2').datetimepicker({
        		format: 'DD/MM/YYYY'
			});
			$('#form-editwarga').on('submit',function(e) {
			var form = $('#form-editwarga')[0];
			var data = new FormData(form);
			var wrgnokk = $('#wrg_nokk').val();
			swal({
			  title: "Simpan Data",
			  text: "Apakah anda ingin menyimpan data ini ?",
			  confirmButtonText:"Yakin",
			  confirmButtonColor: "#002855",
			  cancelButtonText:"Tidak",
			  showCancelButton: true,
			  closeOnConfirm: false,
			  type: "warning",
			  showLoaderOnConfirm: true
			}, function () {
				$.ajax({
					type: "POST",
					enctype: 'multipart/form-data',
					url:'<?=base_url('app/data/warga/saveeditdetailkeluarga');?>',
					data: data,
					processData: false,
					contentType: false,
					cache: false,
					success:function(e){
						if (e === "data warga belum terdaftar") {
						
						  swal({
							title: "DUPLICATE",
						  confirmButtonColor: "#002855",
						//   text: "Nomor KTP sudah ada di database! Silahkan Koreksi!",
						text: "Warga Belum Terdaftar !",
						  type: "error"
						});
						}
						else if (e === "berhasil") {
						swal({
						  title: "Success",
						  confirmButtonColor: "#002855",
						  text: "Data berhasil disimpan !.",
						  type: "success"
						},function(){
							window.location='<?=base_url('app/data/warga/listdetailkeluarga/');?>'+wrgnokk+'';
						  });
						}
						else{
						swal({
						  title: "Failed",
						  confirmButtonColor: "#002855",
						  text: e+"1",
						  type: "error"
						});
						}
						
					},
					error:function(xhr, ajaxOptions, thrownError){
						swal({
						  title: "Failed",
						  confirmButtonColor: "#002855",
						  text: e+"2",
						  type: "error"
						});
					}
					
				});
				return false;
			});
			e.preventDefault(); 
		  });
		  
		</script>
  </body>
</html>
