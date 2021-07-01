<?php 

require 'fungsi.php';
if (isset($_POST['submit'])) {
  if (fungsi_pendaftaran($_POST)>0) {
    echo "<script>
      alert('Pendaftaran Berhasil')
    </script>";
  }
  else{
   echo mysqli_error($koneksi_database);
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Puskesmas Mulyorejo</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->



<!-- untuk debugging sementara dimatikan -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">




  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio - v2.1.1
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <i class="icofont-clock-time"></i> Monday - Saturday, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="icofont-phone"></i> Call us now +1 5589 55488 55
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="login/login.php">Login</a></li>
          <li><a href="#departments">Departments</a></li>
          <li><a href="#doctors">Doctors</a></li>
          <!-- <li class="drop-down"><a href="">Drop Down</a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Deep Drop Down</a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(gambar/tempat2.jpg)">
          <div class="container">
            <h2>Welcome to <span>Puskesmas</span></h2>
            <p>Selamat datang di Puskesmas Desa Mulyorejo </p>
            <a href="#about" class="btn-get-started scrollto">Tentang kami</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(gambar/dokterbaik.jpg)">
          <div class="container">
            <h2>Melayani Sepenuh Hati Setiap Hari</h2>
            <p>Keselamatan dan kepuasan kalian adalah prioritas kami</p>
            <a href="#about" class="btn-get-started scrollto">Tentang kami</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(gambar/dokterindo.jpg)">
          <div class="container">
            <h2>Dokter-dokter yang berkualitas</h2>
            <p>Dokter dokter terbaik siap untuk melayani anda. Selalu siaga dan siap selalu. </p>
            <a href="#about" class="btn-get-started scrollto">Tentang kami</a>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Apakah anda ingin berkonsultasi dengan dokter?</h3>
          <p> Buat janji temu dengan cepat dan mudah melalui website Puskesmas Desa</p>
          <a class="cta-btn scrollto" href="#appointment">Registrasi untuk Bertemu</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang kami</h2>
          <p>Puskesmas Mojolangu 4.0 adalah puskesmas modern yang mengutamakan pelayanan maksimal dengan basis websites yang interaktif.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="gambar/namatem.jfif" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Puskesmas modern pertama di indonesia yang memadukan fitur akses booking online dan konsultasi online. visi misi kami ada 3 yaitu: </h3>
            <p class="font-italic">
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i> Memaksimalkan pengobatan dan pelayanan sistem kesehatan dengan penggunaan database dan website </li>
              <li><i class="icofont-check-circled"></i> memberikan pelayanan terbaik untuk lingkungan setempat</li>
              <li><i class="icofont-check-circled"></i> aktif dalam edukasi masyarakat</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-doctor-alt"></i>
              <span data-toggle="counter-up">3</span>
              <p><strong>Doctors</strong> dokter terbaik dalam bidangnya</p>
              <a href="#"> baca lebih dalam &raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-patient-bed"></i>
              <span data-toggle="counter-up">3</span>
              <p><strong>Departments</strong> terdapat tiga bagian yaitu Dokter Umum, Anak dan Ibu hamil</p>
              <a href="#">Baca lebih dalam &raquo;</a>
            </div>
          </div>

       

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Buat pertemuan</h2>Isi data diri anda untuk memudahkan proses antrian bertemu dengan dokter </p>
        </div>

        <form action="" method="post">
          <div class="form-row">
            <div class="col-md-4 form-group">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="Password" name="password1" class="form-control" id="password1" placeholder="Password Baru" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="password" name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 form-group">
              <input type="varchar" name="kota" class="form-control" id="kota" placeholder="Kota" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="tel" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomer Telepon" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
                  <input type="integer" name="Umur" class="form-control" id="Umur" placeholder="Umur" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 form-group">
                  <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" >
                  <div class="validate"></div>
            </div>      
            <div class="col-md-4 form-group">
              <input type="text" name="kelamin" class="form-control" id="kelamin" placeholder="Jenis Kelamin" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
          </div>

          <div class="form-group">
            <textarea class="form-control" name="alamat" rows="5" placeholder="Alamat Lengkap"></textarea>
            <div class="validate"></div>
          </div> 
          <div class="form-group">
            <textarea class="form-control" name="keluhan" rows="5" placeholder="Keluhan yang dirasakan"></textarea>
            <div class="validate"></div>
          </div>          
          <div class="text-center"><button type="submit" name="submit">Buat Pertemuan</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section -->

   
    

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Dokter</h2>
          <p>Kami selalu memberikan pelayanan terbaik melalui dokter dokter kami yang memiliki kompetensi terbaik untuk pelayanan masyarakat</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="gambar/akmal.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Dr. Akmal Taher</h4>
                <span>Dokter Umum</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="gambar/ivana.jfif" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Dr.Ivanna Theressa</h4>
                <span>Dokter Anak</span>
              </div>
            </div>
          </div>
		  
		  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="gambar/listya.jfif" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Dr.Listya Paramita</h4>
                <span>Dokter Kandungan</span>
              </div>
            </div>
          </div>

          

        </div>

      </div>
    </section><!-- End Doctors Section -->

   


      <div class="container"> 
              <div class="col-md-40">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Alamat kami</h3>
                  <p>Jl. Budi Utomo No. 11 A Malang</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email kami</h3>
                  <p>info@example.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Telepon</h3>
                  <p>(0341) 5074917</p>
                </div>
              </div>
          
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>