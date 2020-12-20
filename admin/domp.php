<?php

include('koneksi.php');
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$query = mysqli_query($koneksi,"select * from dosen");
$html = ' <table border="1" style="width: 100%">
   
  
    <tr>

      <th align="center" width="100"><img src="../img/ian.png" width="90" height="130"></th>
      <td colspan="7"><b><center><font size="24px" face="Arial">KEMENTRIAN AGAMA REPUBLIK INDONESIA</font></center>
        <center><font size="20px" face="Arial">INSTITUT AGAMA ISLAM NEGERI(IAIN) BUKITTINGGI</font></center>
        <center><font size="20px" face="Arial">LEMBAGA PENELITIAN DAN PENGABDIAN MASYARAKAT</font></center></b>
      
      <center><font size="1">Kampus II:Jalan Gurun Aur Kubang Putih Kab.Agam - Sumatra Barat - Telepon/Fax : (0752) 22875)</font></center>
       <center><font size="1">Website : www.ftik.iainbukittinggi.ac.id | e-mail :</font><font color="blue" size="1"> ftik@iainbukittinggi.ac.id </font></center></td>
     
      
    <tr>
  </table>
  <hr>
  <br>';
$html .= '<table border="1" width="100%" cellpadding="4" cellspacing="0">
        <tr>
            <th>Kode</th>
            <th width="50">Tgl</th>
            <th>Nama</th>
            <th>Asal</th>
            <th>Nope</th>
            <th>Tujuan</th>
            <th>Alamat</th>
            <th>Kesan</th>
        </tr>';

while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
        <td>".$row['nidn']."</td>
        <td>".$row['nama']."</td>
        <td>".$row['nama']."</td>
        <td>".$row['nama']."</td>
        <td>".$row['golongan']."</td>
        <td>".$row['nidn']."</td>
        <td>".$row['golongan']."</td>
        <td>".$row['golongan']."</td>
    </tr>";
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_siswa.pdf');

?>