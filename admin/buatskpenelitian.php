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
            <a href="pengajuanskpenelitian.php"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">
            <?php
        include "koneksi.php";
        $kode=$_GET['kode'];
        $datad = mysqli_query($koneksi,"select * from pendaftaransk where kode='$kode'");
        while($data = mysqli_fetch_array($datad)){
        ?>

            <form action="" method="post" enctype="multipart/form-data" >
               <div class="form-group">
                <label>No Surat*</label>
                <input class="form-control" type="text" name="no_surat" placeholder="Nomor Surat" required="" />
              </div>

              <div class="form-group">
                <label>NIDN*</label>
                <input class="form-control" type="number" name="nidn" value="<?php echo $data['nidn'];?>" readonly />
              </div>


               <?php
              $nidn=$data['nidn'];
              $datad = mysqli_query($koneksi,"select * from dosen where nidn='$nidn'");
              while($data = mysqli_fetch_array($datad)){
              ?>
              <div class="form-group">
                <label>Nama*</label>
                <input class="form-control" type="text" name="nama" value="<?php echo $data['nama'];?>" readonly >
              </div>
            <?php }
            $kode=$_GET['kode'];
            $datad = mysqli_query($koneksi,"select * from pendaftaransk where kode='$kode'");
            while($data = mysqli_fetch_array($datad)){
             ?>

               <div class="form-group">
                <label>Judul</label>
                <textarea class="form-control" name="judul" readonly=""><?php echo $data['judul'];?></textarea>
                <input class="form-control" type="hidden" name="hari" value="<?php echo $data['hari'];?>" required="" />
                <input class="form-control" type="hidden" name="bulan" value="<?php echo $data['bulan'];?>" required="" />
                <input class="form-control" type="hidden" name="tahun" value="<?php echo $data['tahun'];?>" required="" />
                <input class="form-control" type="hidden" name="tempat" value="<?php echo $data['tempat'];?>" required="" />
                <input class="form-control" type="hidden" name="golongan" value="<?php echo $data['golongan'];?>" required="" />
                <input class="form-control" type="hidden" name="pangkat" value="<?php echo $data['pangkat'];?>" required="" />

              </div>

             
             

              <?php }; } ?>          

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

        $no_surat=$_POST['no_surat'];
        $nidn=$_POST['nidn'];
        $nama=$_POST['nama'];
        $judul=$_POST['judul'];
        $golongan=$_POST['golongan'];
        $pangkat=$_POST['pangkat'];
        $tanggal=date('y/m/d');
        $hari=$_POST['hari'];
        $bulan=$_POST['bulan'];
        $tahun=$_POST['tahun'];
        $kode=$_GET['kode'];

         //seleksi data dari data base
        $cekdata = mysqli_query($koneksi,"select * from skpenelitian where no_surat='$no_surat'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekdata);
        // cek apakah username dan password di temukan pada database
        if($cek > 0){
        echo"<script>alert('data sudah ada!');</script>";
        }
        else
        {
        
         //seleksi data dari data base
      mysqli_query($koneksi,"insert into skpenelitian values
            ('',
            '$no_surat',
            '$nidn',
            '$judul',
            '$pangkat',
            '$golongan',
            '$tanggal',
            '$hari',
            '$bulan',
            '$tahun')");

      mysqli_query($koneksi,"delete from pendaftaransk where kode='$kode'");                    
      echo"<script> alert('surat berhasil dibuat.');</script>";
      echo"<script> window.location='pengajuanskpenelitian.php';</script>";
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
