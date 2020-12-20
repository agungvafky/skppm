<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$nidn= $_POST['nidn'];
$password= md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from dosen where nidn='$nidn' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	

		// buat session login dan username
		$_SESSION['nidn'] = $data['nidn'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['golongan'] = $data['golongan'];
		$_SESSION['jabatan'] = $data['jabatan'];
		$_SESSION['foto'] = $data['foto'];

		// alihkan ke halaman dashboard admin
		header("location:user/index.php");
	}	
else{
	header("location:index.php?pesan=gagal");
}

?>