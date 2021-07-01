<?php 
session_start();

require '../../fungsi.php';

$idDariUrl=$_GET["nama_obat"];

$DataDariServer= AmbilDataDariFunction("SELECT * FROM obat WHERE nama_obat='$idDariUrl'")[0];

if (isset($_POST["dataSubmit"])) {
var_dump($_POST);
  if (update_obat($_POST)>=0) {  
    echo "<script>
    alert('data berhasil diupdate');
    document.location.href='../admin_obat.php';
    </script>";
  }
  else{
    echo "<script>
    alert('data gagal update');
    document.location.href='../admin_obat.php';
    </script>";
    echo mysqli_error($koneksi_database);
  }
}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Ubah Status Obat</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">      
          <div class="input-box">
            <span class="details">Nama Obat</span>
            <input type="text" name="nama_obat" value="<?php echo $DataDariServer["nama_obat"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Jumlah Obat</span>
            <input type="integer"name="jumlah_obat" value="<?php echo $DataDariServer["jumlah_obat"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Harga Obat</span>
            <input type="text"name="harga_obat" value="<?php echo $DataDariServer["harga_obat"]; ?>">
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