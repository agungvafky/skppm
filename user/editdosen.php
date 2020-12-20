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
            <a href="dosen.php"><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">
            <?php
        include "koneksi.php";
        $nidn=$_GET['nidn'];
        $datad = mysqli_query($koneksi,"select * from dosen where nidn='$nidn'");
        while($data = mysqli_fetch_array($datad)){
        ?>

            <form action="" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label>NIDN*</label>
                <input class="form-control" type="number" name="nidn" value="<?php echo $nidn;?>" required="" />
              </div>

              <div class="form-group">
                <label>Nama*</label>
                <input class="form-control" type="text" name="nama" value="<?php echo $data['nama'];?>" required="" />
              </div>

              <div class="form-group">
                <label>Golongan</label>
                <select class="form-control" name="golongan">
                   <option><?php echo $data['golongan'];?></option>
                  <option>III/b</option>
                  <option>III/c</option>
                  <option>III/d</option>
                  <option>IV/a</option>
                </select>
              </div>

                <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan">
                   <option><?php echo $data['jabatan'];?></option>
                  <option>Asisten Ahli</option>
                  <option>Lektor</option>
                  <option>Lektor Kepala</option>
                </select>
              </div>

              <div class="form-group">
                <label>Password*</label>
                <input class="form-control" type="hidden" name="oldpas"  value="<?php echo $data['password'];?>" required="" />
                <input class="form-control" type="password" name="password"  placeholder="<?php echo $data['password'];?>" />
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat"><?php echo $data['alamat'];?></textarea>
              </div>

              <div class="form-group">
                <label>Foto</label>
                <input type="hidden" name="oldfile" value="<?php echo $data['foto'];?>">
                <input type="file" name="file" class="form-control"  />
              </div>    

              <?php } ?>          

              <button type="submit" name="edit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
             
            </form>

          </div>

          <div class="card-footer small text-muted">
            * tidak boles kosong
          </div>

        </div>

        <?php

        if(isset($_POST['edit']))
      {
        $nidn=$_POST['nidn'];
        $nama=$_POST['nama'];
        $golongan=$_POST['golongan'];
        $jabatan=$_POST['jabatan'];
       
          if (!empty($_POST['password']))
          {
            $password=md5($_POST['password']);
          }
         else
         {
          $password=$_POST['oldpas'];
         }

        $alamat=$_POST['alamat'];


       if (!empty($_FILES['file']['name']))
      {
         $filename=$_FILES['file']['name'];
      }
     else
     {
      $filename=$_POST['oldfile'];
     }
        
         //seleksi data dari data base
       mysqli_query($koneksi,"update dosen set 
        nama='$nama',
        golongan='$golongan',
        jabatan='$jabatan',
        password='$password',
        alamat='$alamat',
        foto='$filename' where nidn='$nidn'");

                     move_uploaded_file($_FILES['file']['tmp_name'], "../tempat/".$_FILES['file']['name']);
                    echo"<script> alert('data berhasil di ubah.');</script>";
                    echo"<script> window.location='dosen.php';</script>";
    }
        ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
