<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pengguna where id='$id'");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Data dengan ID : $id, berhasil dihapus,');</script>";
echo "<script> window.location='pengguna.php';</script>"; 
?>