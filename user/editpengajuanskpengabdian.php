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
     <?php
        include "koneksi.php";
        $kode=$_GET['kode'];
        $datad = mysqli_query($koneksi,"select * from pendaftaranskpengabdian where kode='$kode'");
        while($data = mysqli_fetch_array($datad)){
        ?>

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
            <a href="ajukanskpengabdian.php"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="card-body">

        <?php
        include "koneksi.php";
        $kode=$_GET['kode'];
        $datad = mysqli_query($koneksi,"select * from pendaftaranskpengabdian where kode='$kode'");
        while($data = mysqli_fetch_array($datad)){
          $hari=explode(" dan ", $data['hari']);
        ?>

            <form action="" method="post" enctype="multipart/form-data" >       
              <div class="form-group">
                <label>Judul*</label>
                <textarea class="form-control" name="judul"  required=""><?php echo $data['judul'];?></textarea>
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
                <label>Tempat Pengabdian*</label>
                <textarea class="form-control" name="tempat" required=""><?php echo $data['tempat'];?></textarea>
              </div>

              <div class="form-group">
                <label>Berkas</label>
                 <input type="hidden" name="oldfile" value="<?php echo $data['berkas'];?>">
                <input type="file" name="file" class="form-control"  />
              </div>              

              <button type="submit" name="edit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
             
            </form>
<?php } ?>
           

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

        <?php }

        if(isset($_POST['edit']))
      {
        $kode=$_GET['kode'];
        $judul=$_POST['judul'];
        $keterangan="Diproses";
        $font="green";
        $hari = implode(" dan ", $_POST['hari']);
        $bulan=$_POST['bulan'];
      
        $tempat=$_POST['tempat'];
       
       if (!empty($_FILES['file']['name']))
      {
         $filename=$_FILES['file']['name'];
      }
     else
     {
      $filename=$_POST['oldfile'];
     }
        
         //seleksi data dari data base
       mysqli_query($koneksi,"update pendaftaranskpengabdian set 
        judul='$judul',
        hari='$hari',
        bulan='$bulan',
        tempat='$tempat',
        keterangan='$keterangan',
        font='$font',
        berkas='$filename' where kode='$kode'");

                     move_uploaded_file($_FILES['file']['tmp_name'], "../berkas/".$_FILES['file']['name']);
                    echo"<script> alert('data berhasil di ubah.');</script>";
                    echo"<script> window.location='ajukanskpengabdian.php';</script>";
    }
        ?>

  <?php include('partial/moodal.php'); ?>

   <?php include('partial/js.php'); ?>

</body>

</html>
