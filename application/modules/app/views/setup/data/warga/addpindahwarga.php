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
			
                $.post( "<?php echo base_url("app/data/warga/get_noktp"); ?>",{ wrgnik : wrgnik}, function(data) {

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
						
						$("#savebtn").text("Ubah");
				
			
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
                    <h2>Form Tambah Data Perpindahan Penduduk</h2>
                    <div class="clearfix"></div>
					
                  </div>
                  <div class="x_content">
				  <form id="form-adddetailkeluarga" data-parsley-validate class="form-horizontal form-label-left" method="post">
					   <input type="hidden" id="CRTUSR" name="CRTUSR" class="form-control col-md-7 col-xs-12" value="<?=$this->session->userdata('userid');?>">
					   <input type="hidden" id="wrg_nokk" name="wrg_nokk" required="" maxlength="16" class="form-control col-md-4 col-xs-12" value="<?=$this->uri->segment(5);?>">
					   <input type="hidden" id="wrg_nokkdb" name="wrg_nokkdb" required="" maxlength="16" class="form-control col-md-4 col-xs-12">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nik">Nomor KTP 
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" id="wrg_nik" name="wrg_nik" required="" maxlength="16" class="form-control col-md-4 col-xs-12">
						  
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12">
                          <span class="input-group-btn">
							  <button type="button" id="idbtn" class="btn btn-warning">Check No.KTP</button>
						  </span>
						</div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrg_nama">Nama Penduduk
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrg_nama" name="wrg_nama" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrgpindah_tgl">Tanggal Pindah 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="wrgpindah_tgl" name="wrgpindah_tgl" required="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrgpindah_tujuan">Tujuan Pindah 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="wrgpindah_tujuan" name="wrgpindah_tujuan" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wrgpindah_alasan">Alasan Pindah 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea id="wrgpindah_alasan" class="form-control" name="wrgpindah_alasan" required="" maxlength="100" ></textarea>
                        </div>
                      </div>
					 
					  <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" id="savebtn">Tambah</button>
						  
                          <a href="<?=base_url();?>app/data/warga/listdetailkeluarga/<?=$this->uri->segment(5);?>" class="btn btn-primary" id="savebtn">Kembali</a>
						  
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
			
			$('#form-adddetailkeluarga').on('submit',function(e) {
			var form = $('#form-adddetailkeluarga')[0];
			var data = new FormData(form);
			var wrgnokk = $('#wrg_nokk').val();
			var wrgnokkdb = $('#wrg_nokkdb').val();
			if (wrgnokkdb != wrgnokk) {
				var texttitle = "Ubah No KK";
				var textalert = "Apakah Penduduk ingin pindah KK Baru ?"
			}else {
				var texttitle = "Simpan Data";
				var textalert = "Apakah anda ingin menyimpan data ini ?"
				
			}
			swal({
			  title: texttitle,
			  text: textalert,
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
					url:'<?=base_url('app/data/warga/savedetailkeluarga');?>',
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
							window.location='<?=base_url('app/data/warga/listdetailkeluarga/');?>'+wrgnokk;
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
