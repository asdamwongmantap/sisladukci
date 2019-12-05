<!DOCTYPE html>
<html lang="en">
  <head>
		<?php
            $data['namakry'] = $this->session->userdata('fullname');
			$this->load->view('ui/headermeta.php',$data);
		?>
	
  </head>
  <script type="text/javascript">
$(document).ready(function(){
		$("#idbtn").click(function(){
			var wrgnik = document.getElementById('wrg_nik').value;
			var searchby = "noktp";
                $.post( "<?php echo base_url("app/data/warga/get_noktp"); ?>",{ wrgnik : wrgnik,searchby:searchby}, function(data) {

				var obj = JSON.parse(data);
				// console.log(data)
				if (data == "[]"){
						alert("Data Tidak ditemukan");
						$("#wrg_statushubungan").html("<option value='Kepala Keluarga'>Kepala Keluarga</option><option value='Istri'>Istri</option><option value='Anak'>Anak</option>");
						$("#wrg_nama").val("");
						$("#wrg_alamat").val("");
						$("#savebtn").text("Tambah");

				}
				else{
					obj.forEach(function(items) {
					var nik = items.wrg_nik;
					var nama = items.wrg_nama;
					var alamat = items.wrg_alamat;
					var statushubungan = items.wrg_statushubungan;
					var nokk = items.wrg_nokk;

						$("#wrg_nama").html(nama);
						$("#wrg_nama").val(nama);
						$("#wrg_alamat").html(alamat);
						$("#wrg_alamat").val(alamat);
						$("#wrg_nokkdb").html(nokk);
						$("#wrg_nokkdb").val(nokk);
						// $("#wrg_statushubungan").html(statushubungan);
						// $("#wrg_statushubungan").val(statushubungan);
					
						// alert(statushubungan);
						// $("#wrg_statushubungan").html("<option value='Kepala Keluarga'>Kepala Keluarga</option><option value='Istri'>Istri</option><option value='Anak'>Anak</option>");
						if (statushubungan == "Kepala Keluarga") {
							$("#wrg_statushubungan").html("<option value='Kepala Keluarga' selected>Kepala Keluarga</option><option value='Istri'>Istri</option><option value='Anak'>Anak</option>");
						}else if (statushubungan == "Istri") {
							$("#wrg_statushubungan").html("<option value='Kepala Keluarga'>Kepala Keluarga</option><option value='Istri' selected>Istri</option><option value='Anak'>Anak</option>");
						}else if (statushubungan == "Anak") {
							$("#wrg_statushubungan").html("<option value='Kepala Keluarga'>Kepala Keluarga</option><option value='Istri'>Istri</option><option value='Anak' selected>Anak</option>");
						}else {
							$("#wrg_statushubungan").html("<option value='Kepala Keluarga'>Kepala Keluarga</option><option value='Istri'>Istri</option><option value='Anak'>Anak</option>");
						}
						
						// $("#savebtn").text("Ubah");
				
			
					});
				}
				
					
        });
		// alert(APPNO);
		
	});
					
});	
</script>
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
                    <h2>Form Pembuatan Surat Izin Menikah</h2>
                    <div class="clearfix"></div>
					
                  </div>
                  <div class="x_content">
				  <form id="form-addizinmenikah" data-parsley-validate class="form-horizontal form-label-left" method="post">
					   <!-- <input type="hidden" id="kat_id" name="kat_id" class="form-control col-md-7 col-xs-12" value="KK"> -->
					
					 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_surat">No. Surat
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="no_surat" name="no_surat" required="" maxlength="20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_surat">Tanggal Surat 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group date" id="myDatepicker2">
							<input type="text" class="form-control" id="tgl_surat" name="tgl_surat" value="<?=$dateto;?>"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
							</div>	
						</div>
					  </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nik">NIK Pihak 1 
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" id="wrg_nik" name="wrg_nik" required="" maxlength="16" class="form-control col-md-4 col-xs-12">
						  
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12">
                          <span class="input-group-btn">
							  <button type="button" id="idbtn" class="btn btn-warning">Check NIK</button>
						  </span>
						</div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nama">Nama Pihak 1
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrg_nama" name="wrg_nama" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tujuan">Tujuan Pembuatan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tujuan" name="tujuan" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
					  </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_namapihak2">Nama Ayah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrg_namapihak2" name="wrg_namapihak2" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
					  </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tmpatlahir_pihak2">Tempat Lahir Ayah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tmpatlahir_pihak2" name="tmpatlahir_pihak2" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgllahir_pihak2">Tanggal Lahir Ayah 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group date" id="myDatepicker3">
							<input type="text" class="form-control" id="tgllahir_pihak2" name="tgllahir_pihak2" value="<?=$dateto;?>"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
							</div>	
						</div>
					  </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_namapihak3">Nama Ibu
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrg_namapihak3" name="wrg_namapihak3" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
					  </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tmpatlahir_pihak3">Tempat Lahir Ibu
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tmpatlahir_pihak3" name="tmpatlahir_pihak3" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgllahir_pihak3">Tanggal Lahir Ibu
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group date" id="myDatepicker4">
							<input type="text" class="form-control" id="tgllahir_pihak3" name="tgllahir_pihak3" value="<?=$dateto;?>"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
							</div>	
						</div>
					  </div>
					  
					  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" id="savebtn">Simpan</button>
						  
                        </div>
                      </div>
					  
					  </form>
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
		$('#myDatepicker2').datetimepicker({
        		format: 'DD/MM/YYYY'
			});
			$('#myDatepicker3').datetimepicker({
        		format: 'DD/MM/YYYY'
			});
			$('#myDatepicker4').datetimepicker({
        		format: 'DD/MM/YYYY'
			});
			//proses add
			$('#form-addizinmenikah').on('submit',function(e) {
			var form = $('#form-addizinmenikah')[0];
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
					url:'<?=base_url('app/surat/saveizinmenikah');?>',
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
							window.location='<?=base_url('app/surat/listizinmenikah');?>';
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
