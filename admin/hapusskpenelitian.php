<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$no = $_GET['no'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from skpenelitian where no='$no'");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Data berhasil dihapus,');</script>";
echo "<script> window.location='skpenelitian.php';</script>"; 
?>