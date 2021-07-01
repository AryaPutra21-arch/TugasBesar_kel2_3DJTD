<?php 


function pengecekan_session(){
    session_start();
    if (!isset($_SESSION['nama_pasien'])) {
    header("Location:../login/login.php");
     }    
}
pengecekan_session();

$nama_pasien=$_SESSION['nama_pasien'];

if (isset($_POST['keluar'])) {
    session_unset();
    session_destroy();
    echo("test");
    return pengecekan_session();
}else{

}


// var_dump($_SESSION);
//pengambilan data pasien

require '../fungsi.php';

 
// jika ada pengubahan data
if (isset($_POST["dataSubmit"])) {
    //cek apakah data berhasil ditambahkan atau tidak
    if (update($_POST)>=0) {  // pengandaian sekaligus memasukkan nilai dari $_POST ke $DataDaritambahData
        echo "<script>
        alert('data berhasil diupdate');
        // document.location.href='';
        </script>";
    }
    else{
        echo "<script>
        alert('data gagal update');

        </script>";

        echo mysqli_error($koneksi_database);//untuk menampilkan baris error
    }
}


// untuk antrian
if (isset($_POST['ambil_antrian'])) {
    $nomer_pengobatan = AmbilDataDariFunction("SELECT nomer_pengobatan FROM pasien WHERE nama_pasien='$nama_pasien'");
    $angka_nomer_pengobatan=$nomer_pengobatan[0]['nomer_pengobatan'];

    if ($angka_nomer_pengobatan<=0) {
        $antrian = AmbilDataDariFunction("SELECT*FROM antrian");   
        $antrian_pasien= $antrian[0]["banyak_pasien_mengantri"];
        $antrian_pasien += 1;
         //update di antrian
         mysqli_query($koneksi_database,"UPDATE antrian SET banyak_pasien_mengantri='$antrian_pasien'");
         var_dump(mysqli_affected_rows($koneksi_database));

         //update di nomor antrian pasien
        mysqli_query($koneksi_database,"UPDATE pasien SET nomer_pengobatan='$antrian_pasien' WHERE nama_pasien='$nama_pasien'");
         var_dump(mysqli_affected_rows($koneksi_database));

        var_dump($antrian_pasien);
    } else{
        echo "<script>
        alert('anda sudah mendapatkan antrian');
        </script>";
    }


    
}


$Data = AmbilDataDariFunction("SELECT*FROM pasien WHERE nama_pasien='$nama_pasien'");

?> 


<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Update Data</h1>

<div class="wrap">
        <!-- bagian menu         -->
        <nav class="menu">
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Tutorial</a>
                </li>
                <li>
                    <a href="#">Kontak</a>
                </li>
            </ul>
        </nav>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <ul>
       
            <input type="hidden" name="nama" required value="<?= $_SESSION['nama_pasien']; ?>" >
       
        <li>
            <label>Kota  :</label>
            <input type="text" name="kota"
            required
            value="<?= $Data[0]['kota']; ?>" 
            >
            <br><br>
        </li>
        <li>
            <label>No telepon: </label>
            <input type="text" name="no_tlp" 
            required
            value="<?php echo $Data[0]['no_tlp']; ?>" 
            >
            <br><br>
        </li>
        <li>
            <label>Umur : </label>
            <input type="text" name="umur_pasien" 
            required
            value="<?php echo $Data[0]['umur']; ?>" 
            >
            <br><br>
        </li>
        <li>
            <label>tgl_lahir; :</label>
            <input type="text" name="tgl_lahir"
            required
            value="<?= $Data[0]['tgl_lahir']; ?>" 
            >
            <br><br>
        </li>
        <li>
            <label>jenis_kelamin :</label>
            <input type="text" name="jenis_kelamin" 
            required
            value="<?= $Data[0]['jenis_kelamin']; ?>" 
            >
            <br><br>
        </li>
        <li>
            <label>email :</label>
            <input type="text" name="email"
            required
            value="<?= $Data[0]['email']; ?>" 
            >
            <br><br>
        </li>
        <li>
            <label>alamat pasien :</label>
            <input type="text" name="alamat_pasien"
            required
            value="<?= $Data[0]['alamat_pasien']; ?>" 
            >
            <br><br>
        </li>
        <li>
            <label>keluhan_pasien :</label>
            <input type="text" name="keluhan_pasien"
            required
            value="<?= $Data[0]['keluhan_pasien']; ?>" 
            >
            <br><br>
        </li>
         <li>
            <label>nomer pengobatan :</label>
            <input type="text" name="nomer_pengobatan"
            value="<?= $Data[0]['nomer_pengobatan']; ?>" 
            readonly>
            <br><br>
        </li>

        <li>
            <button type="submit" name="dataSubmit">klik untuk ubah!!!!</button>
        </li>
    </ul>
</form>

<h1> Dapatkan nomer antrian</h1>
<form method="post">
    <button type="submit" name="ambil_antrian">ambil antrian</button>
</form>

<form action="" method="post">
        <button type="submit" name="keluar">keluar</button>
</form>
</body>
</html>
