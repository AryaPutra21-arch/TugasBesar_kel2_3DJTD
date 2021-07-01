<?php 
require '../fungsi.php';

$nama_pasien=$_GET["nama_pasien"];
echo $nama_pasien;

if (hapus($nama_pasien)>0) {
	echo "<script>
		alert('data berhasil di hapus');
		document.location.href='admin_pasien.php';
	</script>";
}
else{
	echo "<script>
		alert('data gagal dihapus');
		//document.location.href='admin_pasien.php';
	</script>";
}

 ?>