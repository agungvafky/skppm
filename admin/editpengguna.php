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
            <a href="dosen.php"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">
            <?php
        include "koneksi.php";
        $id=$_GET['id'];
        $datad = mysqli_query($koneksi,"select * from pengguna where id='$id'");
        while($data = mysqli_fetch_array($datad)){
        ?>

            <form action="" method="post" enctype="multipart/form-data"  >
              <div class="form-group">
                <label>ID*</label>
                <input class="form-control" type="number" name="id" value="<?php echo $id;?>" readonly />
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
                <input type="file" name="file" class="form-control"  />
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
         <?php include('partial/footer.php'); ?>

      </div>
    </div>

        <?php

        if(isset($_POST['edit']))
      {
        $id=$_POST['id'];
        $nama=$_POST['nama'];
          if (!empty($_POST['password']))
          {
            $password=md5($_POST['password']);
          }
         else
         {
          $password=$_POST['oldpas'];
         }
         if (!empty($_FILES['file']['name']))
        {
           $filename=$_FILES['file']['name'];
        }
       else
       {
        $filename=$_POST['oldfile'];
       }
        
         //seleksi data dari data base
       mysqli_query($koneksi,"update pengguna set 
        nama='$nama',
        password='$password',
        foto='$filename' where id='$id'");

        move_uploaded_file($_FILES['file']['tmp_name'], "../tempat/".$_FILES['file']['name']);
        echo"<script> alert('data berhasil di ubah.');</script>";
        echo"<script> window.location='pengguna.php';</script>";
    }
        ?>
         <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include('partial/moodal.php'); ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
