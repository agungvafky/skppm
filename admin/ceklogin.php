<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$id= $_POST['id'];
$password= md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from pengguna where id='$id' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	

		// buat session login dan username
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['foto'] = $data['foto'];

		// alihkan ke halaman dashboard admin
		header("location:dashboard.php");
	}	
else{
	header("location:index.php?pesan=gagal");
}

?>