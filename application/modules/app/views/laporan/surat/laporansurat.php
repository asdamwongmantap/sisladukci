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
                    <h2>Laporan Surat Masuk Dan Keluar RT.007 RW.003</h2>
                    <div class="clearfix"></div>
					
                  </div>
                  <div class="x_content">
				  <form id="form-laporansurat" data-parsley-validate class="form-horizontal form-label-left" method="post" >
					   
				  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_laporansurat">Jenis Laporan 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" id="jenis_laporansurat" name="jenis_laporansurat">
							<option value="suratpengantardomisili">Laporan Surat Pengantar Domisili</option>
							<option value="suratpengantar">Laporan Surat Pengantar</option>
							<option value="suratkuasa">Laporan Surat Kuasa</option>
							<option value="suratkematian">Laporan Surat Kematian</option>
							<option value="suratizinmenikah">Laporan Surat Izin Menikah</option>
						  </select>
                        </div>
					  </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dtm_from">Dari Tanggal 
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <!-- <input type="date" id="dtm_from" name="dtm_from" required="" class="form-control col-md-7 col-xs-12"> -->
						  <div class="input-group date" id="myDatepicker2">
							<input type="text" class="form-control" id="dtm_from" name="dtm_from" value="<?=$dateto;?>"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
							
							</div>	
						</div>
						<div class="col-md-1 col-sm-1 col-xs-12">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="dtm_to">Sampai 
                        </label>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
						
							<div class="input-group date" id="myDatepicker3">
							<input type="text" class="form-control" id="dtm_to" name="dtm_to" value="<?=$dateto;?>"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
							</div>	
						</div>
					  </div>
					  
					  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" id="savebtn">Cetak</button>
						  
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
			//proses add
			// $('#form-laporansurat').on('submit',function(e) {
			
			// var jenislaporan = $('#jenis_laporansurat').val();
			
			
			// swal({
			// 	title: "Success",
			// 	confirmButtonColor: "#002855",
			// 	text: "Laporan Siap Dicetak",
			// 	type: "success"
			// },function(){
			// 	window.location.href ='<?=base_url('app/laporan/pdf');?>'+jenislaporan;
			// 	return false;
			// 	});
				
			// 	e.preventDefault(); 
			// modified 20200119 by asdam
			// var form = $('#form-laporansurat')[0];
			// var data = new FormData(form);
			// var jenislaporan = $('#jenis_laporansurat').val();
			// var texttitle = "Cetak Laporan";
			// 	var textalert = "Apakah anda yakin ingin mencetak laporan dari tanggal?";
			// swal({
			//   title: texttitle,
			//   text: textalert,
			//   confirmButtonText:"Yakin",
			//   confirmButtonColor: "#002855",
			//   cancelButtonText:"Tidak",
			//   showCancelButton: true,
			//   closeOnConfirm: false,
			//   type: "warning",
			//   showLoaderOnConfirm: true
			// }, function () {
			// 	$.ajax({
			// 		type: "POST",
			// 		enctype: 'multipart/form-data',
			// 		url:'<?=base_url('app/laporan/pdf');?>'+jenislaporan,
			// 		data: data,
			// 		processData: false,
			// 		contentType: false,
			// 		cache: false,
			// 		success:function(e){
			// 			if (e !== "error") {
			// 			swal({
			// 			  title: "Success",
			// 			  confirmButtonColor: "#002855",
			// 			  text: "Laporan Siap DiCetak !",
			// 			  type: "success"
			// 			},function(){
			// 				window.location='<?=base_url('app/laporan/pdf');?>'+jenislaporan;
			// 			  });
			// 			}
			// 			else{
			// 			swal({
			// 			  title: "Failed",
			// 			  confirmButtonColor: "#002855",
			// 			  text: e+"1",
			// 			  type: "error"
			// 			});
			// 			}
						
			// 		},
			// 		error:function(xhr, ajaxOptions, thrownError){
			// 			swal({
			// 			  title: "Failed",
			// 			  confirmButtonColor: "#002855",
			// 			  text: e+"2",
			// 			  type: "error"
			// 			});
			// 		}
					
			// 	});
			// 	return false;
			// });
			// e.preventDefault(); 
			// end modified
		//   });
		  
		</script>
  </body>
</html>
