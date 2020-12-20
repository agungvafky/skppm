<!DOCTYPE html>
<html lang="en">

<head>

  <?php include('partial/head.php'); ?>

</head>

<body id="page-top">
   <?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['nidn']==""){
        header("location:../index.php?pesan=gagal");
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
           
          </div>
          <div class="card-body">
            <center>
            <h4>SK Pengabdian</h4>
            </center>

            <div class="table-responsive">
               <table  class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                  <tr>
                    <th>No</th>
                    <th>No Nota</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody align="center">
                  <?php
                  include "koneksi.php";
                  $no=1;
                  $datad = mysqli_query($koneksi,"select * from skpengabdian");
                  while($data = mysqli_fetch_array($datad)){
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['no_surat'];?></td>
                    <td><?php echo $data['judul'];?></td>
                    <td><?php echo $data['tanggal'];?></td>
                    <td>                  
                    <a href="cetakskpengabdian.php?no=<?php echo $data['no']; ?>" class="btn btn-small text-success" target="_blank"><i class="fas fa-print"></i> cetak</a>
                    </td>
                  </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        </div>
      </div>
         <?php include('partial/footer.php'); ?>

      </div>
    </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include('partial/moodal.php'); ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
