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
            
          </div>
          <div class="card-body">

            <h4>Pengajuan SK Pengabdian Masyarakat</h4>
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                  <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Nama Dosen</th>
                    <th>Judul</th>
                    <th>Berkas</th>
                    <th>tanggal Pengajuan</th>
                    <th>Waktu Pengabdian</th>
                    <th>tempat</th>
                    <th width="80">Aksi</th>
                    
                  </tr>
                </thead>
                <tbody align="center">
                  <?php
                  include "koneksi.php";
                  $no=1;
                  $datad = mysqli_query($koneksi,"select * from pendaftaranskpengabdian where keterangan='Diproses'");
                  while($data = mysqli_fetch_array($datad)){
                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['nidn'];?></td>
                    <td>
                       <?php
                        $nidn=$data['nidn'];

                        $sqla=mysqli_query($koneksi,"select * from dosen where nidn='$nidn'");
                        while($sqlb = mysqli_fetch_array($sqla)){
                        echo $sqlb['nama'] ;
                      } ?>
                    </td>
                    <td><?php echo $data['judul'];?></td>
                    <td><a href="../berkas/<?php echo $data['berkas']; ?>" download="<?php echo $data['berkas']; ?>"><i class="fas fa-file-pdf"></i><br><?php echo $data['berkas']; ?></a></td>
                    <td><?php echo $data['tanggal'];?></td>
                    <td><?php echo $data['hari'];?>, <?php echo $data['bulan'];?> <?php echo $data['tahun'];?></td>
                    <td><?php echo $data['tanggal'];?></td>
                   
                    <td>
                    <a href="buatskpengabdian.php?kode=<?php echo $data['kode']; ?>" class="btn btn-small text-success"><i class="fas fa-check-square"></i> </a>
                    <a href="tolakskpengabdian.php?kode=<?php echo $data['kode']; ?>" class="btn btn-small text-danger"><i class="fas fa-minus-square"></i></a>
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
