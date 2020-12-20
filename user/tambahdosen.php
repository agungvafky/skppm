<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php" ?>

<head>

  <?php include('partial/head.php'); ?>

</head>

<body id="page-top">

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
            <a href=""><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">

            <form action="" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label>NIDN*</label>
                <input class="form-control" type="number" name="nidn" placeholder="NIDN" required="" />
              </div>

              <div class="form-group">
                <label>Nama*</label>
                <input class="form-control" type="text" name="nama" placeholder="Nama Dosen" required="" />
              </div>

              <div class="form-group">
                <label>Golongan</label>
                <select class="form-control" name="golongan">
                   <option disabled="" selected="">--Pilih disini--</option>
                  <option>III/b</option>
                  <option>III/c</option>
                  <option>III/d</option>
                  <option>IV/a</option>
                </select>
              </div>

                <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan">
                   <option disabled="" selected="">--Pilih disini--</option>
                  <option>Asisten Ahli</option>
                  <option>Lektor</option>
                  <option>Lektor Kepala</option>
                </select>
              </div>

              <div class="form-group">
                <label>Password*</label>
                <input class="form-control" type="password" name="password"  required="" />
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat"></textarea>
              </div>

              <div class="form-group">
                <label>Foto</label>
                <input class="form-control" type="file" name="file"  required="" />
              </div>              

              <button type="submit" name="simpan" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
             
            </form>

          </div>

          <div class="card-footer small text-muted">
            * tidak boles kosong
          </div>

        </div>

        <?php

        if(isset($_POST['simpan']))
      {
        $nidn=$_POST['nidn'];
        $nama=$_POST['nama'];
        $golongan=$_POST['golongan'];
        $jabatan=$_POST['jabatan'];
        $password=md5($_POST['password']);
        $alamat=$_POST['alamat'];
       $filename=$_FILES['file']['name'];
        
         //seleksi data dari data base
        $cekdata = mysqli_query($koneksi,"select * from dosen where nidn='$nidn'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekdata);
        // cek apakah username dan password di temukan pada database
        if($cek > 0){
        echo"<script>alert('data sudah ada!');</script>";
        }
        else
        {
            mysqli_query($koneksi,"insert into dosen values
            ('$nidn',
            '$nama',
            '$golongan',
            '$jabatan',
            '$password',
            '$alamat',
            '$filename')");
        //---simpan pdf ke folder upload--URL nya ke record foto
            move_uploaded_file($_FILES['file']['tmp_name'], "../tempat/".$_FILES['file']['name']);
        echo"<script>alert('data berhasil disimpan');
        </script>";
        }
    }
        ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
