<?php 
require '../fungsi.php';

$id_dokter=$_GET["id_dokter"];
echo $id_dokter;

if (hapus_dokter($id_dokter)>0) {
	echo "<script>
		alert('data berhasil di hapus');
		document.location.href='admin_dokter.php';
	</script>";
}
else{
	echo "<script>
		alert('data gagal dihapus');
		//document.location.href='admin_dokter.php';
	</script>";
}

 ?>