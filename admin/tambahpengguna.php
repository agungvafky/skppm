<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php" ?>

<head>

  <?php include('partial/head.php'); ?>

</head>

<body id="page-top">
   <?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['id']==""){
        header("location:index.php?pesan=gagal");
    }
 
    ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
     <?php include('partial/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('partial/topbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
          <div class="container-fluid">

         
          <!-- DataTables -->
       <div class="card mb-3">
          <div class="card-header">
            <a href="pengguna.php"><i class="fas fa-arrow-left"></i>Kembali</a>
          </div>
          <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label>Id*</label>
                <input class="form-control" type="number" name="id" placeholder="ID Pengguna" required="" />
              </div>

              <div class="form-group">
                <label>Nama*</label>
                <input class="form-control" type="text" name="nama" placeholder="Nama" required="" />
              </div>


              <div class="form-group">
                <label>Password*</label>
                <input class="form-control" type="text" name="password" placeholder="Password" required="" />
              </div>

              <div class="form-group">
                <label>Foto</label>
                <input class="form-control" type="file" name="file"  required="" />
              </div>              

              <button type="submit" name="simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
             
            </form>

          </div>

          <div class="card-footer small text-muted">
            * tidak boles kosong
          </div>

        </div>
          </div>
      </div>
         <?php include('partial/footer.php'); ?>

      </div>
    </div>

        <?php

        if(isset($_POST['simpan']))
      {
        $id=$_POST['id'];
        $nama=$_POST['nama'];
        $password=md5($_POST['password']);
        $filename=$_FILES['file']['name'];
        
         //seleksi data dari data base
        $cekdata = mysqli_query($koneksi,"select * from dosen where id='$id'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekdata);
        // cek apakah username dan password di temukan pada database
        if($cek > 0){
        echo"<script>alert('data sudah ada!');</script>";
        }
        else
        {
            mysqli_query($koneksi,"insert into pengguna values
            ('$id',
            '$nama',
            '$password',
            '$filename')");
        //---simpan pdf ke folder upload--URL nya ke record foto
        move_uploaded_file($_FILES['file']['tmp_name'], "../tempat/".$_FILES['file']['name']);
        echo"<script>alert('data berhasil disimpan');
        </script>";
        }
    }
        ?>
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include('partial/moodal.php'); ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
