<?php 

session_start();

require '../fungsi.php';
// var_dump($_POST);
if (isset($_POST["selanjutnya"])) {
  $DataDariServer= AmbilDataDariFunction("SELECT nomor_antrian_sekarang FROM antrian")[0];
  $nomor_antrian_sekarang=$DataDariServer["nomor_antrian_sekarang"];
  $nomor_antrian_sekarang +=1;
  // var_dump($nomor_antrian_sekarang);

  mysqli_query($koneksi_database,"UPDATE antrian SET nomor_antrian_sekarang='$nomor_antrian_sekarang'");
  // var_dump(mysqli_affected_rows($koneksi_database));
}
if (isset($_POST["ulang"])) {
  $DataDariServer= AmbilDataDariFunction("SELECT nomor_antrian_sekarang FROM antrian")[0];
  $nomor_antrian_sekarang=$DataDariServer["nomor_antrian_sekarang"];
  $nomor_antrian_sekarang =0;
  // var_dump($nomor_antrian_sekarang);

  mysqli_query($koneksi_database,"UPDATE antrian SET nomor_antrian_sekarang='$nomor_antrian_sekarang'");
  // var_dump(mysqli_affected_rows($koneksi_database));
}
$DataDariServer= AmbilDataDariFunction("SELECT * FROM antrian")[0];
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
	<style type="text/css">
		.lingkaran{
			position: absolute;
			top: 25%;
			left: 30%;
			display: flex;

		}
		input[type="submit"]{
			color: blue;
			font-size: 20px;
			background: none;
			border: none;
			text-decoration: none;
			margin:50PX;
			width: 200px;
			height: 200px;
			background: white;
			border-radius: 50%;
			box-shadow: 0 0 0 40px rgba(37,255,11,0.1);
		}
		input[type="submit"]:hover{
			
			background-color: lightgreen;
		}
	</style>
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
		<div class="item" style="overflow-x:auto;">
			<div class="lingkaran">	
				<form action="" method="post">
					<input class="tombol" type="submit" name="selanjutnya" value="<?php echo $DataDariServer["nomor_antrian_sekarang"]; ?>">
					<input class="tombol" type="submit" name="ulang" value="Reset">
				</form>
				
					
				
					
			</div>
			
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