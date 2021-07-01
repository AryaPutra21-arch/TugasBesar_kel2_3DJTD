<?php 
require '../fungsi.php';

$nama_obat=$_GET["nama_obat"];
var_dump($nama_obat);

if (hapus_obat($nama_obat)>0) {
	echo "<script>
		alert('data berhasil di hapus');
		// document.location.href='admin_obat.php';
	</script>";
}
else{
	echo "<script>
		alert('data gagal dihapus');
		// document.location.href='admin_dokter.php';
	</script>";
}

 ?>