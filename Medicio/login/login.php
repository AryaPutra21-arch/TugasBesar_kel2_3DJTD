<?php 
session_start();

if (isset($_SESSION['nama_pasien'])) {
	header("Location:../dashboard/nomer_antrian.php");
}



if (isset($_POST['konfirmasi'])) {
	$koneksi_database= mysqli_connect("localhost","root","","medicio");
	$namaYangDimasukkan=$_POST['namaMasuk'];
	$passwordYangDimasukkan=$_POST['passwordMasuk'];

	//ambil data yang sesuai input dan database
	$DataDariDatabase=mysqli_query($koneksi_database,"SELECT * FROM pasien WHERE nama_pasien='$namaYangDimasukkan'");

	//cek username
	if (mysqli_num_rows($DataDariDatabase)===1) {
	/*mysqli_num_rows untuk menghitung ada berapa baris yang dikembalikan fungsi (select)
	kalau ketemu nilai nya 1 kalau salah nilainya 0
	$tampung=mysqli_num_rows($DataDariDatabase);
	var_dump($tampungUsernam);die;*/

		//cek password
		$passwordDariDatabase= mysqli_fetch_assoc($DataDariDatabase);
		//barisnya udah diambil dari mysqli_num_rows

		$tampungPassword=password_verify($passwordYangDimasukkan, $passwordDariDatabase["password_enkripsi"]);
		//passwor_verify menghasilkan boolenan true atau false
		//var_dump($tampungPassword);die;

		//jika pasword dan username cocok maka bisa masuk ke indeks
		if ($tampungPassword === true) {

			//set session

			$_SESSION['nama_pasien']=$namaYangDimasukkan;


			header("Location:../dashboard/nomer_antrian.php");
			exit;//supaya berhenti sampai header
		}
	}

	$kesalahan=true;// jika diganti false maka akan ada tulisan langsung  'Username atau pasword salah'

}

 ?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(images/bg-1.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="" class="signin-form" method="post">
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" required name="namaMasuk">
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
			      		<?php if(isset($kesalahan)===true) :?>
								<p>Username atau Password salah</p>
								<?php endif; ?>
		            <div class="form-group">
		              <input id="password-field" type="password" class="form-control" required name="passwordMasuk">
		              <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="konfirmasi">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

