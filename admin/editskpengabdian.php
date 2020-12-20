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
            <a href="skpengabdian.php"><i class="fas fa-arrow-left"></i>Kembali</a>
          </div>
          <div class="card-body">
            <?php
        include "koneksi.php";
        $no=$_GET['no'];
        $datad = mysqli_query($koneksi,"select * from skpengabdian where no='$no'");
        while($data = mysqli_fetch_array($datad)){
        ?>

             <form action="" method="post" enctype="multipart/form-data" >
               <div class="form-group">
                <label>No Surat*</label>
                <input class="form-control" type="text" name="no_surat" value="<?php echo $data['no_surat']; ?>" readonly="" />
              </div>

              <div class="form-group">
                <label>NIDN*</label>
                <input class="form-control" type="number" name="nidn" value="<?php echo $data['nidn'];?>" readonly="" />
              </div>
              <?php
              
              $nidn=$data['nidn'];
              $datad = mysqli_query($koneksi,"select * from dosen where nidn='$nidn'");
              while($data = mysqli_fetch_array($datad)){
              ?>
              <div class="form-group">
                <label>Nama*</label>
                <input class="form-control" type="text" name="nama" value="<?php echo $data['nama'];?>" required="" />
              </div>
            <?php }
            $no=$_GET['no'];
            $datad = mysqli_query($koneksi,"select * from skpengabdian where no='$no'");
            while($data = mysqli_fetch_array($datad)){
               $hari=explode(" dan ", $data['hari']);
             ?>

               <div class="form-group">
                <label>Judul*</label>
                <textarea class="form-control" name="judul"  required=""><?php echo $data['judul'];?></textarea>
                 <input class="form-control" type="hidden" name="golongan" value="<?php echo $data['golongan'];?>" required="" />
                <input class="form-control" type="hidden" name="pangkat" value="<?php echo $data['pangkat'];?>" required="" />
              </div>

              <div class="form-group">
                <label>Hari Pengabdian*</label><br>
                <label><input type="checkbox" name="hari[]"  value="Senin" <?php if (in_array("Senin", $hari)) echo "checked";?>>&nbsp;Senin</label>
                 &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Selasa" <?php if (in_array("Selasa", $hari)) echo "checked";?>>&nbsp;Selasa</label>
                  &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Rabu" <?php if (in_array("Rabu", $hari)) echo "checked";?>>&nbsp;Rabu</label>
                  &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Kamis" <?php if (in_array("Kamis", $hari)) echo "checked";?>>&nbsp;Kamis</label>
                  &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Jum'at" <?php if (in_array("Jum'at", $hari)) echo "checked";?>>&nbsp;Jum'at</label>
                  &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Sabtu" <?php if (in_array("Sabtu", $hari)) echo "checked";?>>&nbsp;Sabtu</label>
                  &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Minggu" <?php if (in_array("Minggu", $hari)) echo "checked";?>>&nbsp;Minggu</label>
              </div>

                <div class="form-group">
                <label>Bulan</label>
                <select class="form-control" name="bulan">
                  <option><?php echo $data['bulan'];?></option>
                   <option>Januari</option>
                  <option>Februari</option>
                  <option>Maret</option>
                  <option>April</option>
                  <option>Mei</option>
                  <option>Juni</option>
                  <option>Juli</option>
                  <option>Agustus</option>
                  <option>September</option>
                  <option>Oktober</option>
                  <option>November</option>
                  <option>Desember</option>
                </select>
              </div>

             <div class="form-group">
                <label>Tempat*</label>
                <textarea class="form-control" name="tempat"  required=""><?php echo $data['tempat'];?></textarea>
              </div>

              <?php }; } ?>          

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
     
        $nidn=$_POST['nidn'];
        $nama=$_POST['nama'];
        $golongan=$_POST['golongan'];
        $pangkat=$_POST['pangkat'];
        $hari = implode(" dan ", $_POST['hari']);
        $bulan=$_POST['bulan'];
        $tempat=$_POST['tempat'];
         $no=$_GET['no'];
        $judul=$_POST['judul'];

         //seleksi data dari data base
       mysqli_query($koneksi,"update skpengabdian set 
        judul='$judul',
        pangkat='$pangkat',
        golongan='$golongan',
        hari='$hari',
        bulan='$bulan',
        tempat='$tempat' where no='$no'");

        echo"<script> alert('data berhasil di ubah.');</script>";
        echo"<script> window.location='skpengabdian.php';</script>";
    }
        ?>
         <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include('partial/moodal.php'); ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
