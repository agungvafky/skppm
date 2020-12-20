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



$query = mysqli_query($koneksi,"select * from skpenelitian inner join dosen on skpenelitian.nidn=dosen.nidn");
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

 
$html .= '<center><b><font size="20px" style="font-family:arial;">Laporan SK Penelitian</u></font></center><br>

<table border="1" width="100%" cellpadding="4" cellspacing="0">
        <tr height="20px" align="center">
            <th>No</th>
            <th>Nama</th>
            <th>NIDN</th>
            <th>No Surat</th>
            <th>Judul Penelitian</th>
            <th>Tanggal Keluar</th>
            <th>Waktu Penelitian</th>
        </tr>';

        $nok=1;
         while($row = mysqli_fetch_array($query))
         {
         $html .='<tr>
            <td align="center">'.$nok.'</td>
            <td>'.$row['nama'].'</td>
            <td>'.$row['nidn'].'</td>
            <td>'.$row['no_surat'].'</td>
            <td>'.$row['judul'].'</td>
            <td>'.$row['tanggal'].'</td>
            <td>'.$row['hari'].'</td>
        </tr>';
        $nok++;
      }
      
      $html .= '</table>
       
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



</body>';

   

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