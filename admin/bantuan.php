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
            <a href=""><i class="fas fa-arrow-left"></i> Back</a>
          </div>
          <div class="card-body">
            <h4>Bantuan</h4><br>
            <p align="justify">
            1. Dahsboard<br>
            Pada halaman ini berisikan jumlah data dari beberapa master data pada sistem ini seperti, jumlah dosen, jumlah dosen yang mengajukan SK penelitian, jumlah dosen yang mengajukan SK pengabdian, Jumlah SK penelitian yang telah diterbitkan, dan Jumlah SK pengabdian yang telah diterbitkan<br><br>

            2. Dosen<br>
            Pada halaman ini berisikan data dosen yang telah terdaftar.<br>
            - tambah data dosen<br>
            Anda dapat menambah data dengan cara tekan tombol add new, lalu isi data sesuai dengan form yang telah ditentukan, tekan simpan untuk menyimpan data dosen.<br>
            -Edit data dosen<br>
            Anda dapat mengubah data dosen dengan cara tekan tombol edit, lalu silahkan ubah data yang anda inginkan, dan tekan simpan untuk menyimpan perubahan.<br>
            -Hapus data dosen <br>
            Anda dapat mengahapus data dosen dengan cara tekan tombol hapus.<br><br>
          
           3. Pengajuan SK Penelitian<br>
           Pada halaman ini berisikan data pengajuan SK penelitian yang diajukan oleh dosen.<br>
           -Terima dan buat SK penlitian<br>
           Anda dapat meneriama pengajuan dan membuat SK penelitian dengan cara tekan tombol (V), dan silahkan isi data sesuai dengan form yang telah ditentukan, dan tekan simpan untuk menyimpan data SK penelitian.<br>
           -Tolak pengajuan SK penelitian<br>
           Anda dapat menolak pengajuan SK penelitian dengan cara tekan tombol (-), isi alasan penolakan, dan tekan simpan untuk mengirim penolakan.<br>,<br>

           4. Pengajuan SK Pengabdian<br>
           Pada halaman ini berisikan data pengajuan SK pengabdian yang diajukan oleh dosen.<br>
           -Terima dan buat SK penlitian<br>
           Anda dapat meneriama pengajuan dan membuat SK pengabdian dengan cara tekan tombol (V), dan silahkan isi data sesuai dengan form yang telah ditentukan, dan tekan simpan untuk menyimpan data SK pengabdian.<br>
           -Tolak pengajuan SK pengabdian<br>
           Anda dapat menolak pengajuan SK pengabdian dengan cara tekan tombol (-), isi alasan penolakan, dan tekan simpan untuk mengirim penolakan.<br><br>

           5. SK Penelitian<br>
           Pada halaman ini berisikan data SK penelitian yang telah diterbitkan.<br>
           -cetak SK penelitian.<br>
           Anda dapat mencetak SK penelitian dengan cara tekan tombol cetak.<br>
           -Edit data SK penelitian<br>
           anda dapat mengubah data SK penelitian dengan cara tekan tombol edit, lalu ubah data yang anda inginkan, dan tekan tombol simpan untuk menyimpan perubahan<br><br>

            6. SK Pengabdian<br>
           Pada halaman ini berisikan data SK pengabdian yang telah diterbitkan.<br>
           -cetak SK pengabdian.<br>
           Anda dapat mencetak SK pengabdian dengan cara tekan tombol cetak.<br>
           -Edit data SK pengabdian<br>
           anda dapat mengubah data SK pengabdian dengan cara tekan tombol edit, lalu ubah data yang anda inginkan, dan tekan tombol simpan untuk menyimpan perubahan<br><br>

           7. Pengaturan Pengguna<br>
            Pada halaman ini berisikan data dari admin pada sistem ini.<br>
            - tambah data pengguna<br>
            Anda dapat menambah data dengan cara tekan tombol add new, lalu isi data sesuai dengan form yang telah ditentukan, tekan simpan untuk menyimpan data pengguna.<br>
            -Edit data pengguna<br>
            Anda dapat mengubah data pengguna dengan cara tekan tombol edit, lalu silahkan ubah data yang anda inginkan, dan tekan simpan untuk menyimpan perubahan.<br>
            -Hapus data pengguna <br>
            Anda dapat mengahapus data pengguna dengan cara tekan tombol hapus.<br><br>



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
