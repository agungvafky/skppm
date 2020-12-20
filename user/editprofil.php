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
    if($_SESSION['nidn']==""){
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

            
         <div class="col-lg-6">
          <!-- DataTables -->
       <div class="card mb-3">
          <div class="card-header">
            <a href="profil.php?nidn=<?php echo $_SESSION['nidn']; ?>"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">
            <?php
        include "koneksi.php";
        $nidn=$_GET['nidn'];
        $datad = mysqli_query($koneksi,"select * from dosen where nidn='$nidn'");
        while($data = mysqli_fetch_array($datad)){
        ?>

            <form action="" method="post" enctype="multipart/form-data"  >
              <div class="form-group">
                <label>NIDN</label>
                <input class="form-control" type="number" name="nidn" value="<?php echo $nidn;?>" readonly />
              </div>

              <div class="form-group">
                <label>Nama*</label>
                <input class="form-control" type="text" name="nama" value="<?php echo $data['nama'];?>" required="" />
              </div>

              <div class="form-group">
                <label>Password*</label>
                <input class="form-control" type="hidden" name="oldpas"  value="<?php echo $data['password'];?>" required="" />
                <input class="form-control" type="password" name="password"  placeholder="<?php echo $data['password'];?>" />
              </div>

              <div class="form-group">
                <label>Foto</label>
                <input type="hidden" name="oldfile" value="<?php echo $data['foto'];?>">
                <input type="file" name="foto" class="form-control"  />
              </div>    

              <?php } ?>          

              <button type="submit" name="edit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
             
            </form>

          </div>

          <div class="card-footer small text-muted">
            * tidak boles kosong
          </div>
        </div>
          </div>
      </div>
    </div>
         <?php include('partial/footer.php'); ?>

      </div>
    </div>

        <?php

        if(isset($_POST['edit']))
      {
        $nidn=$_POST['nidn'];
        $nama=$_POST['nama'];
          if (!empty($_POST['password']))
          {
            $password=md5($_POST['password']);
          }
         else
         {
          $password=$_POST['oldpas'];
         }
         if (!empty($_FILES['foto']['name']))
        {
           $filename=$_FILES['foto']['name'];
        }
       else
       {
        $filename=$_POST['oldfile'];
       }
        
         //seleksi data dari data base
       mysqli_query($koneksi,"update dosen set 
        nama='$nama',
        password='$password',
        foto='$filename' where nidn='$nidn'");

        move_uploaded_file($_FILES['foto']['tmp_name'], "../tempat/".$_FILES['foto']['name']);
        echo"<script> alert('data berhasil di ubah.');</script>";
        echo"<script> window.location='index.php';</script>";
    }
        ?>
         <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include('partial/moodal.php'); ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
