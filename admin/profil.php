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

         <div class="col-lg-6">
          <!-- DataTables -->
        <div class="card mb-3">
          <div class="card-header">
            Profil
           
          </div>
          <div class="card-body">
            
             <?php
        include "koneksi.php";
        $id=$_GET['id'];
        $datad = mysqli_query($koneksi,"select * from pengguna where id='$id'");
        while($data = mysqli_fetch_array($datad)){
        ?>

            <div class="table-responsive">
              <table border="0" width="100%" cellspacing="0">
                
                  <tr>
                    <td width="120" rowspan="5"><img src="../tempat/<?php echo $data['foto'];?>" width="100" height="130"></td>
                    <td width="100">NIDN</td>
                    <td>: <?php echo $nidn ?> </td>
                  </tr>

                   <tr>
                    <td>Nama</td>
                    <td>: <?php echo $data['nama'];?></td>
                  </tr>

                  <tr>
                    <td>Golongan</td>
                    <td>: <?php echo $data['golongan'];?> </td>
                  </tr>

                  <tr>
                    <td>Jabatan</td>
                    <td>: <?php echo $data['jabatan'];?></td>
                  </tr>

                  

                   <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
            
              </table>
            </div>
             <p align="right">
            <a href="editprofil.php?nidn=<?php echo $data['nidn']; ?>">
            <button type="button" name="simpan" class="btn btn-success"><i class="fas fa-edit"></i> Edit</button>
          </a>
            </p>
          <?php } ?>
          
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
