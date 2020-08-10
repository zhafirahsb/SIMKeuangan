<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
require('../../../dompdf/autoload.inc.php');
require('../../../proses/yayasan.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$crud = new Crud;
$tahun2 = $_GET['tahun'];
$bulan2 = $_GET['bulan'];
$spp = $crud->query("SELECT * FROM yayasan_penerimaan_spp WHERE YEAR(tanggal) = '" . $tahun2 . "' AND MONTH(tanggal) = '" . $bulan2 . "'  ORDER BY tanggal ASC");
$pengeluaran = $crud->query("SELECT * FROM yayasan_realisasi_pengeluaran WHERE YEAR(tanggal) = '" . $tahun2 . "' AND MONTH(tanggal) = '" . $bulan2 . "' ORDER BY tanggal ASC");
$baris = count($spp);
if ($baris < count($pengeluaran)) {
  $baris = count($pengeluaran);
}
function tanggal_indonesia($tanggal)
{
  $bulan = array(
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
  return $bulan[$tanggal];
}
$html = '<!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan RKAS</title>
  <style>
  .page_break {
    page-break-before: always;
  }
</style>
  </head>
  <body>';
if (@$spp || @$pengeluaran) {
  $html .= '
  <h4 class="text-center">Laporan Keuangan SMP Muhammadiyah 19 <br>Bulan : ' . tanggal_indonesia($bulan2) . '<br>Tahun ' . $tahun2 . '</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Tgl</th>
            <th>Uraian</th>
            <th>Jumlah</th>
            <th></th>
            <th>No</th>
            <th>Tgl</th>
            <th>Uraian</th>
            <th>Jumlah</th>
          </tr>
        </thead>
        <tbody>';
  $nospp = 1;
  $nopengeluaran = 1;
  $tpengeluaran = 0;
  $tspp = 0;
  // foreach ($spp as $sp) {
  for ($i = 0; $i < $baris; $i++) {
    $html .= '
    <tr>
      <td>' . (@$spp[$i] ? $nospp : '&nbsp;') . '</td>
      <td>' . (@$spp[$i] ? date('d', strtotime($spp[$i]['tanggal'])) : '') . '</td>
      <td>' . @$spp[$i]['uraian'] . '</td>
      <td>' . (@$spp[$i] ? 'Rp.' . number_format(@$spp[$i]['total'], 0, ',', '.') : '') . '</td>
      <td></td>
      <td>' . (@$pengeluaran[$i] ? $nopengeluaran : '&nbsp;') . '</td>
      <td>' . (@$pengeluaran[$i] ? date('d', strtotime($pengeluaran[$i]['tanggal'])) : '') . '</td>
      <td>' . @$pengeluaran[$i]['uraian'] . '</td>
      <td>' . (@$pengeluaran[$i] ? 'Rp' . number_format(@$pengeluaran[$i]['jumlah'], 0, ',', '.') : '') . '</td>
    </tr>';
    $tspp += @$spp[$i] ? $spp[$i]['total'] : 0;
    $tpengeluaran += @$pengeluaran[$i] ? $pengeluaran[$i]['jumlah'] : 0;
    $nopengeluaran++;
    $nospp++;
  }
  $html .= '
  <tr>
    <th colspan="3">Total</th>
    <td>Rp.' . number_format($tspp, 0, ',', '.') . '</td>
    <td></td>
    <th colspan="3">Total</th>
    <td>Rp.' . number_format($tpengeluaran, 0, ',', '.') . '</td>
  </tr>
  </tbody>
  </table>';
} else {
  $html .= '<h6 class="mt-5 text-center">Belum ada data !</h6>';
}
$html .= '
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>';

$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
// $dompdf->setPaper('A4', 'potrait');
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Laporan Rencana Pemasukan Yayasan ' . date('d M Y') . '.pdf');
// require('../../../view/tata_usaha/laporan/bos_pdf.php');
