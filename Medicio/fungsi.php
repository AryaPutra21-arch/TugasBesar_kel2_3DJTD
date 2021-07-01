<?php 
$koneksi_database= mysqli_connect("localhost","root","","medicio");
function fungsi_pendaftaran($data_registrasi){
    global $koneksi_database;
    $NamaDataPendaftar= strtolower( stripslashes( $data_registrasi['nama']));
    $Password1DataPendaftar=mysqli_real_escape_string ($koneksi_database,$data_registrasi['password1']);
    $Password2DataPendaftar=mysqli_real_escape_string($koneksi_database,$data_registrasi['password2']);


    $kota_pasien=$data_registrasi['kota'];
    $no_tlp_pasien= $data_registrasi['nomor_hp'];
    $umur_pasien=$data_registrasi['Umur'];
    $tanggal_lahir_pasien= $data_registrasi['tanggal_lahir'];
    $kelamin_pasien=$data_registrasi['kelamin'];
    $email_pasien=$data_registrasi['email'];
    $alamat_pasien= $data_registrasi['alamat'];
    $keluhan_pasien=$data_registrasi['keluhan'];
    //cek username sudah ada atau belum
    $CekDataNama=mysqli_query($koneksi_database,"SELECT nama_pasien FROM pasien WHERE nama_pasien='$NamaDataPendaftar'");
    //ada tanda kutip '' karena dalamnya adalah variabel

    if (mysqli_fetch_assoc($CekDataNama)) {
        echo "<script>
            alert('Nama sudah digunakan. Harap masukkan nama lain');
        </script>";
        return false;
    }

    //cek konfirmasi pasword apakah sama?
    if ($Password1DataPendaftar !== $Password2DataPendaftar) {
        echo "<script>
            alert('Konfirmasi Password Salah');
        </script>";
        return false;
    }
        //return 1;// jika pasword sama

    //enkripsi pasword
    $PasswordDienkripsi= password_hash($Password1DataPendaftar, PASSWORD_DEFAULT);
    /*$PasswordDienkripsi=md5($Password1DataPendaftar);
    md5 tidak digunakan karena hasil enkripsi bisa di searching lewat google
    var_dump($PasswordDienkripsi);die;
    */

    //tambahkan nilai input ke database
    mysqli_query($koneksi_database,"INSERT INTO pasien VALUES('','$NamaDataPendaftar','$Password1DataPendaftar','$kota_pasien','$no_tlp_pasien','$umur_pasien','$tanggal_lahir_pasien', '$kelamin_pasien','$email_pasien','$PasswordDienkripsi', '$alamat_pasien','$keluhan_pasien','jksad')");
    return mysqli_affected_rows($koneksi_database);
}

function AmbilDataDariFunction($DataDariIndex){
    global $koneksi_database;
    $hasil=mysqli_query($koneksi_database,$DataDariIndex);
    //wadah data array dari SQL
    // var_dump($hasil);
    $WadahData=[];
    while ($DataDariSQL=mysqli_fetch_assoc($hasil)){
        $WadahData[]=$DataDariSQL;
    }
    return $WadahData;
}

function update($DataDariFileUpdate){
    global $koneksi_database;
    $nama_pasien=$DataDariFileUpdate["nama"];// tidak perlu htmlspecialchar karena user tidak menginputkannya
    $kota_pasien=htmlspecialchars($DataDariFileUpdate["kota"]);//fungsi htmlspecialchar adalah keamanan dari hacker
    $no_tlp=$DataDariFileUpdate["no_tlp"];
    $umur_pasien=htmlspecialchars($DataDariFileUpdate["umur_pasien"]);
    $tgl_lahir=$DataDariFileUpdate["tgl_lahir"];
    $jenis_kelamin=htmlspecialchars($DataDariFileUpdate["jenis_kelamin"]);
    $email_pasien=htmlspecialchars($DataDariFileUpdate["email"]);
    $alamat_pasien=htmlspecialchars($DataDariFileUpdate["alamat_pasien"]);
    $keluhan_pasien=htmlspecialchars($DataDariFileUpdate["keluhan_pasien"]);
    $nomer_pengobatan=htmlspecialchars($DataDariFileUpdate["nomer_pengobatan"]);


    $pertanyaan="UPDATE pasien SET 
    kota='$kota_pasien',
    no_tlp='$no_tlp',
    umur='$umur_pasien',
    tgl_lahir='$tgl_lahir',
    jenis_kelamin='$jenis_kelamin',
    email='$email_pasien',
    alamat_pasien='$alamat_pasien',
    keluhan_pasien='$keluhan_pasien',
    nomer_pengobatan='$nomer_pengobatan'
    WHERE   nama_pasien='$nama_pasien'
    ";
    mysqli_query($koneksi_database,$pertanyaan);//jika me return ini akan menghasilkan nilai bolean
    return mysqli_affected_rows($koneksi_database);// jika gagal -1 , jika berhasil hasilnya 1   
}


function hapus($idDariFileHapus){
    global $koneksi_database;
    mysqli_query($koneksi_database,"DELETE FROM pasien WHERE nama_pasien='$idDariFileHapus'");

    return mysqli_affected_rows($koneksi_database);
}


function update_dokter($DataDariFileUpdate){
    global $koneksi_database;
    $id_dokter=htmlspecialchars($DataDariFileUpdate["id_dokter"]);
    $nama_dokter=$DataDariFileUpdate["nama_dokter"];// tidak perlu htmlspecialchar karena user tidak menginputkannya
    $jam_kerja=htmlspecialchars($DataDariFileUpdate["jam_kerja"]);//fungsi htmlspecialchar adalah keamanan dari hacker
    $waktu_penanggung_jawab=$DataDariFileUpdate["waktu_penanggung_jawab"];

    $pertanyaan="UPDATE dokter SET 
    nama_dokter='$nama_dokter',
    jam_kerja='$jam_kerja',
    waktu_penanggung_jawab='$waktu_penanggung_jawab'
    WHERE   id_dokter='$id_dokter'
    ";
    mysqli_query($koneksi_database,$pertanyaan);//jika me return ini akan menghasilkan nilai bolean
    var_dump(mysqli_affected_rows($koneksi_database));
    return mysqli_affected_rows($koneksi_database);// jika gagal -1 , jika berhasil hasilnya 1   
}

function hapus_dokter($idDariFileHapus){
    global $koneksi_database;
    mysqli_query($koneksi_database,"DELETE FROM dokter WHERE id_dokter='$idDariFileHapus'");

    return mysqli_affected_rows($koneksi_database);
}

function update_obat($DataDariFileUpdate){
    global $koneksi_database;
    $nama_obat=$DataDariFileUpdate["nama_obat"];
    $jumlah_obat=htmlspecialchars($DataDariFileUpdate["jumlah_obat"]);
    $harga_obat=$DataDariFileUpdate["harga_obat"];
var_dump($DataDariFileUpdate);
    $pertanyaan="UPDATE obat SET 
    nama_obat='$nama_obat',
    jumlah_obat='$jumlah_obat',
    harga_obat='$harga_obat'
    WHERE nama_obat='$nama_obat'
    ";
    mysqli_query($koneksi_database,$pertanyaan);//jika me return ini akan menghasilkan nilai bolean
    var_dump(mysqli_affected_rows($koneksi_database));
    return mysqli_affected_rows($koneksi_database);// jika gagal -1 , jika berhasil hasilnya 1   
}

function hapus_obat($idDariFileHapus){
    global $koneksi_database;
    mysqli_query($koneksi_database,"DELETE FROM obat WHERE nama_obat='$idDariFileHapus'");

    return mysqli_affected_rows($koneksi_database);
}

function update_ruangan($DataDariFileUpdate){
    global $koneksi_database;
    $nomor_ruangan=htmlspecialchars($DataDariFileUpdate["nomor_ruangan"]);
    $nama_ruangan=$DataDariFileUpdate["nama_ruangan"];
    $kategori_ruangan=htmlspecialchars($DataDariFileUpdate["kategori_ruangan"]);//fungsi htmlspecialchar adalah keamanan dari hacker
    $status=$DataDariFileUpdate["status"];

    $pertanyaan="UPDATE ruangan SET 
    nama_ruangan='$nama_ruangan',
    kategori_ruangan='$kategori_ruangan',
    status='$status'
    WHERE   nomor_ruangan='$nomor_ruangan'
    ";
    mysqli_query($koneksi_database,$pertanyaan);//jika me return ini akan menghasilkan nilai bolean
    var_dump(mysqli_affected_rows($koneksi_database));
    return mysqli_affected_rows($koneksi_database);// jika gagal -1 , jika berhasil hasilnya 1   
}

 ?>
