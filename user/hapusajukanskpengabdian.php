<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$kode = $_GET['kode'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pendaftaranskpengabdian where kode='$kode'");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Data dengan NIDN : $kode, berhasil dihapus,');</script>";
echo "<script> window.location='ajukanskpengabdian.php';</script>"; 
?>