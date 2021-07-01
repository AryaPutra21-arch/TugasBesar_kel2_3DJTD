<?php 

require '../fungsi.php';
$Data = AmbilDataDariFunction("SELECT*FROM pasien");
// var_dump($Data);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
	
	<!-- Template Styles -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<!-- CSS Reset -->
	<link rel="stylesheet" href="css/normalize.css">
	
	<!-- Milligram CSS minified -->
	<link rel="stylesheet" href="css/milligram.min.css">
	
	<!-- Main Styles -->
	<link rel="stylesheet" href="css/styles.css">
	
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
	<div class="navbar">
		<div class="row">
			<div class="column column-30 col-site-title"><a href="#" class="site-title float-left">Medialoot</a></div>
			
			<div class="column column-30">
				<div class="user-section"><a href="#">
					<img src="http://via.placeholder.com/50x50" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
					<div class="username">
						<h4>Jane Donovan</h4>
						<p>Administrator</p>
					</div>
				</a></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="sidebar" class="column" style="background-color: black;">
			<h5>Navigation</h5>
			<ul>
				<li><a href="admin_pasien.php"><em class="fa fa-address-card"></em> Pasien</a></li>
				<li><a href="admin_dokter.php"><em class="fa fa-user-md"></em> Dokter</a></li>
				<li><a href="admin_urutan.php"><em class="fa fa-stethoscope"></em> Urutan</a></li>
				<li><a href="admin_obat.php"><em class="fa fa-medkit"></em> Obat</a></li>
				<li><a href="admin_ruangan.php"><em class="fa fa-building"></em> Ruangan</a></li>
			</ul>
		</div>


		<section id="main-content" class="column column-offset-20">
		<div style="overflow-x:auto;">
			<table border="1" cellpadding="10" cellspacing="0">
				<tr>
					<th style="padding-left: 10px;">No</th>
					<th>Nama Pasien</th>
					<th>Kota</th>
					<th>Nomer Telepon</th>
					<th>Umur</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Keluhan</th>
					<th>Nomer </th>
					<th>Ubah </th>
					<th>Hapus </th>
				</tr>

				<?php $i=1; ?>
				<?php foreach ($Data as $baris) : ?>
				<tr>
					<td style="text-align: center;"><?= $i; ?></td>
					<td><?= $baris["nama_pasien"]; ?></td>
					
					<td><?php echo $baris["kota"]; ?></td>
					<td><?php echo $baris["no_tlp"] ?></td>
					<td><?php echo $baris["umur"] ?></td>
					<td><?php echo $baris["tgl_lahir"] ?></td>
					<td><?php echo $baris["jenis_kelamin"] ?></td>
					<td><?php echo $baris["email"] ?></td>
					<td><?php echo $baris["alamat_pasien"] ?></td>
					<td><?php echo $baris["keluhan_pasien"] ?></td>
					<td><?php echo $baris["nomer_pengobatan"] ?> </td>


					<!-- untuk hapus dan delete -->
					<td>
						<a href="update/update_pasien.php?nama_pasien=<?php echo $baris["nama_pasien"]; ?>">ubah</a> 
					</td>
					<td>
						<a href="delete_pasien.php?nama_pasien=<?= $baris["nama_pasien"]; ?>" 
							onclick="return confirm('yakin???');">hapus</a>
							<!--Masih belum dipelajari tentang scrip onclick html dan javasript-->
					</td>
				</tr>
				<?php $i++; ?>
				<?php endforeach; ?>

			</table>
			</div>
		</section>

	</div>
	
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script>
	window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
		});
		var chart2 = document.getElementById("bar-chart").getContext("2d");
		window.myBar = new Chart(chart2).Bar(barChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
		});
		var chart4 = document.getElementById("pie-chart").getContext("2d");
		window.myPie = new Chart(chart4).Pie(pieData, {
		responsive: true,
		segmentShowStroke: false
		});
		var chart5 = document.getElementById("radar-chart").getContext("2d");
		window.myRadarChart = new Chart(chart5).Radar(radarData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.05)",
		angleLineColor: "rgba(0,0,0,.2)"
		});
		var chart6 = document.getElementById("polar-area-chart").getContext("2d");
		window.myPolarAreaChart = new Chart(chart6).PolarArea(polarData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		segmentShowStroke: false
		});
	};
	</script>			

</body>
</html> 