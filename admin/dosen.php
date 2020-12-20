<!DOCTYPE html>
<html lang="en">

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
            <a href="tambahdosen.php"><i class="fas fa-plus"></i> Add New</a>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Golongan</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include "koneksi.php";
                  $no=1;
                  $datad = mysqli_query($koneksi,"select * from dosen");
                  while($data = mysqli_fetch_array($datad)){
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['nidn'];?></td>
                    <td><?php echo $data['nama'];?></td>
                     <td><img src="../tempat/<?php echo $data['foto'];?>" width="80" height="110"></td>
                    <td><?php echo $data['golongan'];?></td>
                    <td><?php echo $data['jabatan'];?></td>
                    <td>
                    <a href="editdosen.php?nidn=<?php echo $data['nidn']; ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    <a href="hapusdosen.php?nidn=<?php echo $data['nidn']; ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
