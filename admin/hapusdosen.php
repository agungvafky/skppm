<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$nidn = $_GET['nidn'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from dosen where nidn='$nidn'");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Data dengan NIDN : $nidn, berhasil dihapus,');</script>";
echo "<script> window.location='dosen.php';</script>"; 
?>