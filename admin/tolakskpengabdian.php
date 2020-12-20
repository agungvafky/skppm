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
     <?php
        include "koneksi.php";
        $kode=$_GET['kode'];
        $datad = mysqli_query($koneksi,"select * from pendaftaranskpengabdian where kode='$kode'");
        while($data = mysqli_fetch_array($datad)){
        ?>

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
            <a href="pengajuanskpengabdian.php"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data" >

             

             <div class="form-group">
                <label>Alasan Penolakan</label>
                <input class="form-control" type="text" name="keterangan" placeholder="Penolakan" required="" />
              </div>

             

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

        <?php }

        if(isset($_POST['edit']))
      {
        $kode=$_GET['kode'];
        $keterangan=$_POST['keterangan'];
        $font="red";
       
      
        
         //seleksi data dari data base
       mysqli_query($koneksi,"update pendaftaranskpengabdian set 
        keterangan='$keterangan',
       
        font='$font' where kode='$kode'");

                    
                    echo"<script> alert('data berhasil di ubah.');</script>";
                    echo"<script> window.location='pengajuanskpengabdian.php';</script>";
    }
        ?>

  <?php include('partial/moodal.php'); ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
