<?php

include('koneksi.php');
require_once("../dompdf/dompdf_config.inc.php");

function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

 $no=$_GET['no'];

$query = mysqli_query($koneksi,"select * from skpengabdian inner join dosen on skpengabdian.nidn=dosen.nidn where no='$no'");
$html = ' <html>

<head>
<style>
@page { margin: 2cm 2cm 2cm 3cm; }
.style1{
  font-size: 21px;
  font-family:Arial;
}
</style>
</head>
<body>
<table border="0" style="width: 100%" cellspacing="0" cellpadding="0">
   
  
    <tr>

      <th align="center" width="60"><img src="../img/ian.png" width="80" height="90"></th>
      <td colspan="7"><center><div class="style1"><b>KEMENTRIAN AGAMA REPUBLIK INDONESIA</b></div></center></b>
        <center><font size="17px" face="Arial"><b>INSTITUT AGAMA ISLAM NEGERI(IAIN) BUKITTINGGI</b></font></center>
        <center><font size="17px" face="Arial"><b>LEMBAGA PENELITIAN DAN PENGABDIAN MASYARAKAT</b></font></center>
      
      <center><font size="8.5px">Gedung Rektorat lama Kampus II:Jalan Gurun Aur Kubang Putih Kab.Agam - Sumatra Barat - Telepon : (0752) 34320,34370. fax.(0752) 34310</font></center>
       <center><font size="8.5px">Website : www.ftik.iainbukittinggi.ac.id | e-mail :</font><font color="blue" size="1"> lp2m@iainbukittinggi.ac.id </font></center></td>
     
      
    <tr>
  </table>
  <hr>
  ';
  $row = mysqli_fetch_array($query);
$html .= '<center><b><font size="20px" style="font-family:arial;"><u>SURAT KETERANGAN</u></font></b></center>
<center><font size="16px" style="font-family:Arial;">'.$row['no_surat'].'</font></center><br>

<p size="16px" style="line-height: 1.5em; text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini adalah ketua Lembaga Penelitian dan Pengabdian Masyarakat (LP2M) Institut Agama Islam Negeri (IAIN) Bukittinggi, dengan ini menerangkan : </p>


<table border="0" width="100%" cellpadding="4" cellspacing="0">
        <tr height="20px">
            <td width="200px">Nama</td>
            <td width="5">:</td>
            <td>'.$row['nama'].'</td>
        </tr>
         <tr>
            <td>NIP</td>
            <td>:</td>
            <td>'.$row['nidn'].'</td>
        </tr>
         <tr>
            <td>Pangkat/Golongan</td>
            <td>:</td>
            <td>'.$row['golongan'].'</td>
        </tr>
         <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>'.$row['jabatan'].'</td>
        </tr>
        <br>
        <table border="0" width="100%">
           <tr>
            <td width="60%"></td>
            <td>Bukittinggi, '.tgl_indo(date('Y-m-d')).'<br>
            Ketua LP2M IAIN Bukittinggi<br><br><br><br><br>
            <b>DR. Afrinaldi, S. Sos.I, MA</b><br>
            NIP. 198004032005011003
            </td>
           
        </tr>
        </table>

<p align="right"></p>

<p size="16px" align="justify" style="line-height: 1.5em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat keterangan ini diberikan untuk dapat dipergunakan sebagaimana mestinya.</p>


<p size="16px" align="justify" style="line-height: 1.5em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bahwa yang bersangkutan telah melaksanakan judul penelitian '.$row['judul'].' pada '.$row['hari'].' bulan '.$row['bulan'].' '.$row['tahun'].' di '.$row['tempat'].'.</p>

</body>
        ';

   
$dompdf = new Dompdf();
$html .= '</html>';

$dompdf->load_Html($html);
// Setting ukuran dan orientasi kertas
$dompdf->set_Paper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Sk Penelitian.pdf', array("Attachment"=>0));

?>