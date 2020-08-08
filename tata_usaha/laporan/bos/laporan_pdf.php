<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
require('../../../dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$crud = new Crud;
$tahun = $_GET['tahun'];
$laporan = $crud->read_data('bos_rkas', ['tahun_ajaran' => $tahun]);
$standar = $crud->read_data('tbl_standar_nasional');
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
  <body>
  <h3 class="text-center">Rencana Kegiatan dan Anggaran Sekolah (RKAS)<br>SMP Muhammadiyah 19<br>Tahun : ' . $tahun . '</h3>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No Kode</th>
        <th>Nama Program</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>';
$no = 1;
foreach (@$standar as $st) {
  $dana_rencana = $crud->query("SELECT SUM(jumlah) jumlah FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id_bos_rkas = bos_rkas_detail.bos_rkas WHERE bos_rkas.npsn = '" . $st['idsnp'] . "' AND bos_rkas.tahun_ajaran = '" . $tahun . "'");
  $html .=
    '<tr>
    <td>' . $no . '</td>
    <td>' . $st['nama_program'] . '</td>
    <td>Rp.' . number_format($dana_rencana[0]['jumlah'], 0, '.', '.') . '</td>
  </tr>';
  $no++;
}
$html .= '</tbody>
</table>
<div class="page_break"></div>
<h3 class="text-center">Rencana Kegiatan dan Anggaran Sekolah (RKAS)<br>SMP Muhammadiyah 19<br>Tahun : ' . $tahun . '</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th>No Urut</th>
      <th>No Kode</th>
      <th>Uraian</th>
      <th>Jumlah</th>
    </tr>
  </thead>
  <tbody>
  <tbody>';
$no_detail = 1;
$total = 0;
foreach (@$standar as $st) {
  $html .= '
  <tr>
    <td>' . $no_detail . '</td>
    <td></td>
    <th>Program ' . $st['nama_program'] . '</th>
    <td></td>
  </tr>';
  $no_detail++;
  $rkas = $crud->read_data('bos_rkas', ['npsn' => $st['idsnp'], 'tahun_ajaran' => $tahun]);
  $total_rkas = 0;
  foreach ($rkas as $rk) {
    $html .= '
    <tr>
      <td>' . $no_detail . '</td>
      <td></td>
      <td>Sub-Program ' . $rk['sub_program'] . '</td>
      <td></td>
    </tr>';
    $no_detail++;
    $rkas_detail = $crud->read_data('bos_rkas_detail', ['bos_rkas' => $rk['id_bos_rkas']]);
    $total_detail = 0;
    foreach ($rkas_detail as $rkd) {
      $total_detail += $rkd['jumlah'];
      $html .= '
      <tr>
        <td>' . $no_detail . '</td>
        <td>' . $rkd['no_kode'] . '</td>
        <td>' . $rkd['uraian'] . '</td>
        <td>' . number_format($rkd['jumlah'], 0, ',', '.') . '</td>
      </tr>';
      $no_detail++;
    }
    $html .= '
    <tr>
      <td>' . $no_detail . '</td>
      <td></td>
      <td>Total Sub-Program ' . $rk['sub_program'] . '</td>
      <td>' . number_format($total_detail, 0, ',', '.') . '</td>
    </tr>';
    $total_rkas += $total_detail;
    $no_detail++;
  }
  $html .= '
  <tr>
    <td>' . $no_detail . '</td>
    <td></td>
    <td>Total Program ' . $st['nama_program'] . '</td>
    <td>' . number_format($total_rkas, 0, ',', '.') . '</td>
  </tr>';
  $no_detail++;
  $total += $total_rkas;
}
$html .= '
<tr>
  <td>' . $no_detail . '</td>
  <td></td>
  <th>Total Belanja</th>
  <td>' . number_format($total, 0, ',', '.') . '</td>
</tr>
</tbody>
</tbody>
</table>
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
$dompdf->stream('Laporan RKAS ' . date('d M Y') . '.pdf');
// require('../../../view/tata_usaha/laporan/bos_pdf.php');
