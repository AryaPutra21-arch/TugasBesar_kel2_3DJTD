<?php 
session_start();

require '../../fungsi.php';

$idDariUrl=$_GET["id_dokter"];

$DataDariServer= AmbilDataDariFunction("SELECT * FROM dokter WHERE id_dokter='$idDariUrl'")[0];

if (isset($_POST["dataSubmit"])) {
var_dump($_POST);
  if (update_dokter($_POST)>=0) {  
    echo "<script>
    alert('data berhasil diupdate');
    document.location.href='../admin_dokter.php';
    </script>";
  }
  else{
    echo "<script>
    alert('data gagal update');
    document.location.href='../admin_dokter.php';
    </script>";
    echo mysqli_error($koneksi);
  }
}
 ?>


<!DOCTYPE html>
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
        <div class="user-details">
          <input type="hidden" name="id_dokter" value="<?= $DataDariServer["id_dokter"] ?>">       
          <div class="input-box">
            <span class="details">Nama Dokter</span>
            <input type="text" name="nama_dokter" value="<?php echo $DataDariServer["nama_dokter"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Jam Kerja</span>
            <input type="time"name="jam_kerja" value="<?php echo $DataDariServer["jam_kerja"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Waktu Penanggung Jawab</span>
            <input type="text"name="waktu_penanggung_jawab" value="<?php echo $DataDariServer["waktu_penanggung_jawab"]; ?>">
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