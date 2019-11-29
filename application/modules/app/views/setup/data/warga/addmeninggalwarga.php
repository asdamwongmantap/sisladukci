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
	
	$(document).on('change','#searchby',function(e){
		var searchby = document.getElementById("searchby").value;
		if (searchby == "noktp"){
			$("#labelwrg_nik").text("Nomor KTP");
			$("#labelwrg_nama").text("Nama Penduduk");
			$("#idbtn").text("Check No.KTP");
			document.getElementById("wrg_nik").style.display = "block";
			document.getElementById("wrg_nokk").style.display = "none";
		}else {
			$("#labelwrg_nik").text("Nomor KK");
			$("#labelwrg_nama").text("Nama Kepala Keluarga");
			$("#idbtn").text("Check No.KK");
			document.getElementById("wrg_nokk").style.display = "block";
			document.getElementById("wrg_nik").style.display = "none";
		}
	});
	$("#idbtn").click(function(){
		var searchby = document.getElementById("searchby").value;
			if (searchby == "noktp"){
				var wrgnik = document.getElementById('wrg_nik').value;
			}else {
				var wrgnik = document.getElementById('wrg_nokk').value;
			}
			// var wrgnik = document.getElementById('wrg_nik').value;
			
                $.post( "<?php echo base_url("app/data/warga/get_noktp"); ?>",{ wrgnik : wrgnik,searchby:searchby}, function(data) {

                var obj = JSON.parse(data);
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
                    <h2>Form Tambah Data Kematian Penduduk</h2>
                    <div class="clearfix"></div>
					
                  </div>
                  <div class="x_content">
				  <form id="form-addpindahwarga" data-parsley-validate class="form-horizontal form-label-left" method="post">
					   <input type="hidden" id="CRTUSR" name="CRTUSR" class="form-control col-md-7 col-xs-12" value="<?=$this->session->userdata('userid');?>">
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="searchby">Search By 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="searchby" name="searchby">
							<option value="noktp">No. KTP</option>
							<option value="nokk">No. KK</option>
							
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nik" id="labelwrg_nik">Nomor KTP 
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
						  <input type="text" id="wrg_nik" name="wrg_nik" maxlength="16" class="form-control col-md-4 col-xs-12" style="display:block;">
						  <input type="text" id="wrg_nokk" name="wrg_nokk" maxlength="16" class="form-control col-md-4 col-xs-12" style="display:none;">
						  
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12">
                          <span class="input-group-btn">
							  <button type="button" id="idbtn" class="btn btn-warning">Check No.KTP</button>
						  </span>
						</div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nama" id="labelwrg_nama">Nama Penduduk
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrg_nama" name="wrg_nama" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrgmeninggal_tgl">Tanggal Kematian 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!-- <input type="date" id="wrgmeninggal_tgl" name="wrgmeninggal_tgl" required="" class="form-control col-md-7 col-xs-12"> -->
						  <div class="input-group date" id="myDatepicker2">
							<input type="text" class="form-control" id="wrgmeninggal_tgl" name="wrgmeninggal_tgl" value="<?=$dateto;?>"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
							</div>	
						</div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrgmeninggal_tempat">Tempat Kematian 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrgmeninggal_tempat" name="wrgmeninggal_tempat" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrgmeninggal_sebab">Penyebab Kematian 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea id="wrgmeninggal_sebab" class="form-control" name="wrgmeninggal_sebab" required="" maxlength="100" ></textarea>
                        </div>
                      </div>
					 
					  <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" id="savebtn">Tambah</button>
						  
                          <a href="<?=base_url();?>app/data/warga/listmeninggalwarga" class="btn btn-primary" id="savebtn">Kembali</a>
						  
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
			//proses add
			$('#myDatepicker2').datetimepicker({
        		format: 'DD/MM/YYYY'
			});
			$('#form-addpindahwarga').on('submit',function(e) {
			var form = $('#form-addpindahwarga')[0];
			var data = new FormData(form);
			// var wrgnokk = $('#wrg_nokk').val();
			// alert("ok");
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
					url:'<?=base_url('app/data/warga/savemeninggalwarga');?>',
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
							window.location='<?=base_url('app/data/warga/listmeninggalwarga');?>';
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
