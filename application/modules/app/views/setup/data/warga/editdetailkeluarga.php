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
					
             <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nik">NIK 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrg_nik" name="wrg_nik" required="" maxlength="16" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_nik;?>">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nama">Nama 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrg_nama" name="wrg_nama" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$row->wrg_nama;?>">
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
                          <input type="date" id="wrg_tgllahir" name="wrg_tgllahir" required="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_kwarganegaraan">Kewarganegaraan 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_kwarganegaraan" name="wrg_kwarganegaraan">
							<option value="WNI">WNI</option>
							<option value="WNA">WNA</option>
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_jeniskel">Jenis Kelamin 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_jeniskel" name="wrg_jeniskel">
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_alamat">Alamat 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea id="wrg_alamat" class="form-control" name="wrg_alamat" required="" maxlength="100" ><?=$row->wrg_nik;?></textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_pekerjaan">Pekerjaan 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_pekerjaan" name="wrg_pekerjaan">
							<option value="Pegawai Swasta">Pegawai Swasta</option>
							<option value="Pegawai Negeri">Pegawai Negeri</option>
							<option value="Petani">Petani</option>
							<option value="Pedagang">Pedagang</option>
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_agama">Agama 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_agama" name="wrg_agama">
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Hindu">Hindu</option>
							<option value="Budha">Budha</option>
							<option value="Konghucu">Konghucu</option>
							<option value="Protestan">Protestan</option>
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_pendidikan">Pendidikan Terakhir 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_pendidikan" name="wrg_pendidikan">
							<option value="SD">SD</option>
							<option value="SMP">SMP</option>
							<option value="SMA/SMK/SMU/STM">SMA/SMK/SMU/STM</option>
							<option value="S1">S1</option>
							<option value="S2">S2</option>
							<option value="S3">S3</option>
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_statuskawin">Status Menikah 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="wrg_statuskawin" name="wrg_statuskawin">
							<option value="Lajang">Lajang</option>
							<option value="Menikah">Menikah</option>
							<option value="Duda/Janda">Duda/Janda</option>
						  </select>
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
			$('#form-editwarga').on('submit',function(e) {
			var form = $('#form-editwarga')[0];
			var data = new FormData(form);
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
					url:'<?=base_url('app/data/warga/saveeditwarga');?>',
					data: data,
					processData: false,
					contentType: false,
					cache: false,
					success:function(e){
						if (e !== "error") {
						swal({
						  title: "Success",
						  confirmButtonColor: "#002855",
						  text: "Data berhasil disimpan !.",
						  type: "success"
						},function(){
							window.location='<?=base_url('app/data/warga/listwarga');?>';
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
