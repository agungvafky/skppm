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
            <a href=""><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">
            <h4>Bantuan</h4><br>
            <p align="justify">
            1. Dahsboard<br>
            Pada halaman ini berisikan jumlah data dari beberapa master data pada sistem ini seperti juumlah SK penelitian yang sedang diajukan, jumlah SK pengabdian yang sedang diajukan, Jumlah SK penelitian yang telah diterbitkan, dan Jumlah SK pengabdian yang telah diterbitkan<br><br>
          
           2. Pengajuan SK Penelitian<br>
           Pada halaman ini berisikan data pengajuan SK penelitian yang diajukan.<br>
           -Ajukan Pembuatan SK penlitian<br>
            Anda dapat mengajukan SK Penelitian dengan cara tekan tombol ajukan, isi data sesuai dengan form yang telah disediakan, dan tekan tombol simpan untuk menyimpan data dan melakukan pengajuan pembuatan SK penelitian<br>
           -Edit data pangjuan SK Penelitian<br>
           anda dapat mengubah data pengajuan SK penelitian dengan cara tekan tombol edit, ubah data yang anda inginkan, dan tekan tombol simpan untuk meyimpan perubahan. perhatikan keterangan pada masing-masing data jika font berwarna <font color="red"> merah</font> menyatakan penajuan SK penelitian anda ditolak, silahkan melakukan pengeditan data sesuai dengan keterangan yang tertera<br>
           -Hapus data pengajuan pembuatan SK penelitian<br>
           Anda dapat menghapus data pengajuan SK penelitian dengan cara tekan tombol hapus.<br><br>

            3. Pengajuan SK Pengabdian<br>
           Pada halaman ini berisikan data pengajuan SK pengabdian yang diajukan.<br>
           -Ajukan Pembuatan SK pegabdian<br>
            Anda dapat mengajukan SK Pengabdian dengan cara tekan tombol ajukan, isi data sesuai dengan form yang telah disediakan, dan tekan tombol simpan untuk menyimpan data dan melakukan pengajuan pembuatan SK pengabdian<br>
           -Edit data pangjuan SK Pengabdian<br>
           anda dapat mengubah data pengajuan SK pengabdian dengan cara tekan tombol edit, ubah data yang anda inginkan, dan tekan tombol simpan untuk meyimpan perubahan. perhatikan keterangan pada masing-masing data jika font berwarna <font color="red"> merah</font> menyatakan penajuan SK pengabdian anda ditolak, silahkan melakukan pengeditan data sesuai dengan keterangan yang tertera<br>
           -Hapus data pengajuan pembuatan SK pengabdian<br>
           Anda dapat menghapus data pengajuan SK pengabdian dengan cara tekan tombol hapus.<br><br>

           4. SK Penelitian<br>
           Pada halaman ini berisikan data SK penelitian yang telah diterbitkan.<br>
           -cetak SK penelitian.<br>
           Anda dapat mencetak SK penelitian dengan cara tekan tombol cetak.<br><br>
          
           5. SK Pengabdian<br>
           Pada halaman ini berisikan data SK pengabdian yang telah diterbitkan.<br>
           -cetak SK pengabdian.<br>
           Anda dapat mencetak SK pengabdian dengan cara tekan tombol cetak.<br><br>
           



          </div>

          <div class="card-footer small text-muted">
           
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
