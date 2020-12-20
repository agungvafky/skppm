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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4" title="Jumlah Dosen">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dosen</div>
                      <?php
                      $datad = mysqli_query($koneksi,"select count(nidn) as jum from dosen");
                      while($data = mysqli_fetch_array($datad)){
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['jum'] ;?></div>
                    <?php } ?>  
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4" title="Jumlah Dosen yang mengajukan SK Penelitian">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengajuan SK Penelitian</div>
                      <?php
                      $datad = mysqli_query($koneksi,"select count(kode) as jum from pendaftaransk where keterangan='Diproses'");
                      while($data = mysqli_fetch_array($datad)){
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['jum'] ;?></div>
                      <?php } ?>
                    </div>
                    <div class="col-auto">
                       <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt fa-1x text-gray-300"></i>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-xl-3 col-md-6 mb-4" title="Jumlah dosen yang mengajukan SK pengabdian">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengajuan SK Pengabdian</div>
                      <?php
                      $datad = mysqli_query($koneksi,"select count(kode) as jum from pendaftaranskpengabdian where keterangan='Diproses'");
                      while($data = mysqli_fetch_array($datad)){
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['jum'] ;?></div>
                      <?php } ?>
                    </div>
                    <div class="col-auto">
                       <div class="icon-circle bg-success">
                      <i class="fas fa-file-alt fa-1x text-gray-300"></i>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4" title="Jumlah SK Penelitian yang telah dikelurkan">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SK Penelitian</div>
                      <?php
                      $datad = mysqli_query($koneksi,"select count(no) as jum from skpenelitian");
                      while($data = mysqli_fetch_array($datad)){
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['jum'] ;?></div>
                      <?php } ?>
                    </div>
                    <div class="col-auto">
                       
                      <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4" title="Jumlah SK pengabdian yang telah dikeluarkan">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SK Pengabdian</div>
                      <?php
                      $datad = mysqli_query($koneksi,"select count(no) as jum from skpengabdian");
                      while($data = mysqli_fetch_array($datad)){
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['jum'] ;?></div>
                      <?php } ?>
                    </div>
                    <div class="col-auto">
                      
                      <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                   
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
           

            <!-- Pending Requests Card Example -->
            
          </div>

          <!-- Content Row -->

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Ria Murdani 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  
   <?php include('partial/moodal.php'); ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
