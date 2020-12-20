<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan']=="gagal"){
            echo"<script>alert('Username atau password tidak sesuai');
        </script>";
        }
    }
    ?>
<form method="post" action="ceklogin.php">
	<input type="text" name="nidn">
	<input type="text" name="password">
	<button type="submit">coba</button>
</form>
</body>
</html>