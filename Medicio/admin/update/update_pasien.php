<?php 
session_start();

// //Cek ada atau tidaknya session
// if (!isset($_SESSION['masukDariLogin'])) {
//  header("location:masuk.php");
//  exit;
// }

require '../../fungsi.php';

$idDariUrl=$_GET["nama_pasien"];

$DataDariServer= AmbilDataDariFunction("SELECT * FROM pasien WHERE nama_pasien='$idDariUrl'")[0];//ada [0] karena ada array dalam array. dan datanya dibagian array paling dalam.
// var_dump($DataDariServer);

//metode menambah dengan sedikit aturan MVC
if (isset($_POST["dataSubmit"])) {
var_dump($_POST);
  // var_dump($_FILES);die;

  //cek apakah data berhasil ditambahkan atau tidak
  if (update($_POST)>=0) {  // pengandaian sekaligus memasukkan nilai dari $_POST ke $DataDaritambahData
    echo "<script>
    alert('data berhasil diupdate');
    document.location.href='../admin_pasien.php';
    </script>";

  }
  else{
    echo "<script>
    alert('data gagal update');

    </script>";
    var_dump(tambah($DataDariFileUpdate));
    echo mysqli_error($koneksi);//untuk menampilkan baris error
  }
}
 ?>


<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="" method="post">
        <input type="hidden" name="nama" value="<?php echo $DataDariServer["nama_pasien"]; ?>">
        <div class="user-details">
          
          <div class="input-box">
            <span class="details">Kota Pasien</span>
            <input type="text" name="kota" value="<?php echo $DataDariServer["kota"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">No Telepon</span>
            <input type="text"name="no_tlp" value="<?php echo $DataDariServer["no_tlp"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Umur</span>
            <input type="text"name="umur_pasien" value="<?php echo $DataDariServer["umur"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Tanggal Lahir</span>
            <input type="date"name="tgl_lahir" value="<?php echo $DataDariServer["tgl_lahir"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Jenis Kelamin</span>
            <input type="text"name="jenis_kelamin" value="<?php echo $DataDariServer["jenis_kelamin"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text"name="email" value="<?php echo $DataDariServer["email"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Alamat Pasien</span>
            <input type="text"name="alamat_pasien" value="<?php echo $DataDariServer["alamat_pasien"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Keluhan Pasien</span>
            <input type="text"name="keluhan_pasien" value="<?php echo $DataDariServer["keluhan_pasien"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Nomer Pengobatan</span>
            <input type="text"name="nomer_pengobatan" value="<?php echo $DataDariServer["nomer_pengobatan"]; ?>">
          </div>
        </div>

        <div class="button">
          <input type="submit" name="dataSubmit" value="Ubah">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
