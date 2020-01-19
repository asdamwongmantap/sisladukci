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
                    <h2>Form Bayar Iuran</h2>
                    <div class="clearfix"></div>
					
                  </div>
                  <div class="x_content">
				  <form id="form-bayariuran" data-parsley-validate class="form-horizontal form-label-left" method="post">
				  
				  <input type="hidden" id="no_transaksi" name="no_transaksi" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value=<?=intval(substr($nourutiuran,-3))+1;?>> 
				  <!-- <?php foreach ($nourutiuran as $rowiuran) {?>	
					<input type="text" id="no_transaksi" name="no_transaksi" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value=<?=intval(substr($rowiuran->no_transaksi,5))+1;?>>
						<?php }?> -->
						<?php foreach ($hasilnik as $rownik) {?>
							<input type="hidden" id="wrg_nohp" name="wrg_nohp" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value=<?=$rownik->wrg_nohp;?>>
						<?php }?>
				  <input type="hidden" id="wrg_nik" name="wrg_nik" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value=<?=$this->uri->segment(4);?>>
				  <input type="hidden" id="jenis_transaksi" name="jenis_transaksi" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="Debit">
				  <input type="hidden" id="ket_transaksi" name="ket_transaksi" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="Iuran Bulanan">
				  <!-- <?php foreach ($saldonik as $row) {?>	
							<input type="text" id="saldo_terakhir" name="saldo_terakhir" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$saldonik;?>">
						<?php }?> -->
						<input type="hidden" id="saldo_terakhir" name="saldo_terakhir" required="" maxlength="50" class="form-control col-md-7 col-xs-12" value="<?=$saldonik;?>">
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="saldo_debit">Nominal Bayar
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="saldo_debit" name="saldo_debit" required="" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_transaksi">Tanggal Bayar 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group date" id="myDatepicker2">
							<input type="text" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?=$dateto;?>"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
							</div>	
						</div>
					  </div>
					  
					  <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" id="savebtn">Bayar</button>
						  <a href="<?=base_url();?>app/transaksi/listiuranbln" class="btn btn-primary" id="savebtn">Kembali</a>
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
			//proses add
			$('#form-bayariuran').on('submit',function(e) {
			var form = $('#form-bayariuran')[0];
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
					url:'<?=base_url('app/transaksi/saveiuran');?>',
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
							window.location='<?=base_url('app/transaksi/listiuranbln');?>';
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
