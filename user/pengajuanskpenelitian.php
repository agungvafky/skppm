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
            <a href="ajukanskpenelitian.php"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data" >

             

              <div class="form-group">
                <label>Jenis Kegiatan*</label>
                <textarea class="form-control" name="judul" required=""></textarea>
              </div>
              
              <div class="form-group">
                <label>Hari Pengabdian*</label><br>
                <label><input type="checkbox" name="hari[]"  value="Senin">&nbsp;Senin</label>
                 &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Selasa">&nbsp;Selasa</label>
                  &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Rabu">&nbsp;Rabu</label>
                  &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Kamis">&nbsp;Kamis</label>
                  &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Jum'at">&nbsp;Jum'at</label>
                  &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Sabtu">&nbsp;Sabtu</label>
                  &nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="hari[]"  value="Minggu">&nbsp;Minggu</label>
              </div>

              <div class="form-group">
                <label>Bulan</label>
                <select class="form-control" name="bulan">
                  <option disabled="" selected="">--Pilih disini--</option>
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
                <label>Berkas</label>
                <input class="form-control" type="file" name="file"  required="" />
              </div>              

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
        $nidn=$_SESSION['nidn'];
        $jabatan=$_SESSION['jabatan'];
        $golongan=$_SESSION['golongan'];
        $judul=$_POST['judul'];
       $filename=$_FILES['file']['name'];
       $tanggal=date('y/m/d');
       $hari = implode(" dan ", $_POST['hari']);
        $bulan=$_POST['bulan'];
        $tahun=date('Y');
       


            $keterangan="Diproses";
            $font="green";
        
         //seleksi data dari data base
       
            mysqli_query($koneksi,"insert into pendaftaransk values
            ('',
            '$nidn',
            '$judul',
            '$jabatan',
            '$golongan',
            '$filename',
            '$tanggal',
            '$hari',
            '$bulan',
            '$tahun',
            '$keterangan',
            '$font')");
        //---simpan pdf ke folder upload--URL nya ke record foto
            move_uploaded_file($_FILES['file']['tmp_name'], "../berkas/".$_FILES['file']['name']);
        echo"<script>alert('data berhasil disimpan');
        </script>";
        
    }
        ?>

  <?php include('partial/moodal.php'); ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
