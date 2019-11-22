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
		  <!--list userakses-->
			<div class="row">
			
			<div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-calculator"></i>
				</div>
				<div class="count">Rp.30000</div>

				<h3>Jumlah Uang KAS RT.007</h3>
				<!-- <p>Price List Harga Rumah</p> -->
			</div>
			</div>
			<div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-users"></i>
				</div>
				<div class="count">
					<?php 
					$query = $this->db->query("SELECT * FROM view_detailkeluarga");
					echo $query->num_rows();
					?></div>

				<h3>Jumlah Warga RT.007</h3>
				<!-- <p>Tentang Simulasi Angsuran</p> -->
			</div>
			
			</div>
			<!-- end widget -->
			  		  
            </div>
			<!--end list userakses-->
			<div class="row">
			
			<div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
			<!-- bar chart -->
			<div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Charts <small>By Gender</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<!-- <div id="diagramgender" style="width:100%; height:280px;"></div> -->
					<canvas id="diagramgender"></canvas>
                  </div>
                </div>
              </div>
              <!-- /bar charts -->
			</div>
			<div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
			<!-- bar chart -->
			<div class="col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Charts <small>By Age</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- <div id="graph_bar" style="width:100%; height:280px;"></div> -->
					<canvas id="diagramusia"></canvas>
                  </div>
                </div>
              </div>
              <!-- /bar charts -->
			
			</div>
			<!-- end widget -->
			  		  
            </div>
        </div>
        <!-- /page content -->
		<?php
			// $this->load->view('user/kontenuserakses.php');
			$this->load->view('ui/footermeta.php');
		?>
		
		<script>
		var ctx = document.getElementById("diagramgender").getContext('2d');
		var ctxage = document.getElementById("diagramusia").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Laki-Laki", "Perempuan"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$querylaki = $this->db->query("SELECT * FROM view_detailkeluarga WHERE wrg_jeniskel like '%Laki%'");
					echo $querylaki->num_rows();
					?>, 
					<?php 
					$queryperempuan = $this->db->query("SELECT * FROM view_detailkeluarga WHERE wrg_jeniskel like '%Perempuan%'");
					echo $queryperempuan->num_rows();
					?>, 
					
					],
					backgroundColor: [
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)'
					
					
					],
					borderColor: [
					'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)'
					
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
		var myChartage = new Chart(ctxage, {
			type: 'bar',
			data: {
				labels: ["0-10", "11-20","21-30", "31-50","Lebih dari 50"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$query010 = $this->db->query("SELECT * FROM view_detailkeluarga WHERE wrg_usia BETWEEN 0 AND 10");
					echo $query010->num_rows();
					?>, 
					<?php 
					$query1120 = $this->db->query("SELECT * FROM view_detailkeluarga WHERE wrg_usia BETWEEN 11 AND 20");
					echo $query1120->num_rows();
					?>, 
					<?php 
					$query2130 = $this->db->query("SELECT * FROM view_detailkeluarga WHERE wrg_usia BETWEEN 21 AND 30");
					echo $query2130->num_rows();
					?>, 
					<?php 
					$query3150 = $this->db->query("SELECT * FROM view_detailkeluarga WHERE wrg_usia BETWEEN 31 AND 50");
					echo $query3150->num_rows();
					?>, 
					<?php 
					$queryLB50 = $this->db->query("SELECT * FROM view_detailkeluarga WHERE wrg_usia > 50");
					echo $queryLB50->num_rows();
					?>
					
					],
					backgroundColor: [
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
  </body>
</html>
