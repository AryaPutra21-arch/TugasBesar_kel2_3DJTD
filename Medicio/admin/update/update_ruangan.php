<?php 
session_start();

require '../../fungsi.php';

$idDariUrl=$_GET["nomor_ruangan"];

$DataDariServer= AmbilDataDariFunction("SELECT * FROM ruangan WHERE nomor_ruangan='$idDariUrl'")[0];

if (isset($_POST["dataSubmit"])) {
var_dump($_POST);
  if (update_ruangan($_POST)>=0) {  
    echo "<script>
    alert('data berhasil diupdate');
    document.location.href='../admin_ruangan.php';
    </script>";
  }
  else{
    echo "<script>
    alert('data gagal update');
    document.location.href='../admin_ruangan.php';
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
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Update</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <input type="hidden" name="nomor_ruangan" value="<?= $DataDariServer["nomor_ruangan"] ?>">       
          <div class="input-box">
            <span class="details">Nama Ruangan</span>
            <input readonly="readonly" name="nama_ruangan" value="<?php echo $DataDariServer["nama_ruangan"]; ?>">
          </div>
          <div class="input-box">
            <span class="details">Kategori</span>
            <input readonly="readonly" name="kategori_ruangan" value="<?php echo $DataDariServer["kategori_ruangan"]; ?>">
          </div>
          <div class="input-box">
            <select name="status">
              <option value="ada">Ada</option>
              <option value="kosong">Kosong</option>
            </select>
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