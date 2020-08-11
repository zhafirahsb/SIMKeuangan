<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
require('../../../dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$crud = new Crud;
$tahun = $_GET['tahun'];
$laporan1 = $crud->read_data('bos_realisasi_rekapitulasi', ['tahun_ajaran' => $tahun]);
$standar = $crud->read_data('tbl_standar_nasional');
$komponen = $crud->read_data('bos_realisasi_komponen');
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
    <h4 class="text-center">Rekaputluasi Realisasi Penggunaan Dana Anggaran Sekolah<br>SMP Muhammadiyah 19<br>Tahun : ' . $tahun . '</h4>
    <table border="1" style="font-size: 10px;">
      <thead>
        <tr>
          <th rowspan="2">No Urut</th>
          <th rowspan="2">Program Kegiatan</th>
          <th colspan="' . count($komponen) . '">Penggunaan Dana BOS</th>
          <th rowspan="2">Jumlah</th>
        </tr>
        <tr>';
foreach ($komponen as $k) {
  $html .= '
          <td>' . $k['nama_program'] . '</td>';
}
$html .= '
        </tr>
      </thead>
    <tbody>';
$no = 1;
$total = 0;
$total_sub = array_fill(0, count($komponen), 0);
foreach ($standar as $st) {
  $html .= '
        <tr>
          <td>1.' . $no . '</td>
          <td>' . $st['nama_program'] . '</td>';
  $total_program = 0;
  $no_komponen = 0;
  foreach ($komponen as $k) {
    $jumlah = $crud->query("SELECT SUM(bos_realisasi_detail_komponen.jumlah) jumlah FROM bos_realisasi_rekapitulasi JOIN bos_realisasi_detail_komponen ON bos_realisasi_detail_komponen.relasi_id = bos_realisasi_rekapitulasi.id_bos_realisasi_rekapitulasi WHERE bos_realisasi_rekapitulasi.idsnp = '" . $st['idsnp'] . "' AND bos_realisasi_rekapitulasi.sub_program_id = '" . $k['id_bos_realisasi_komponen'] . "'");
    if (is_null($jumlah[0]['jumlah'])) {
      $jumlah = 0;
    }
    $html .= '
          <td class="text-right">' . number_format($jumlah[0]['jumlah'], 0, ',', '.') . '</td>';
    $total_program += $jumlah[0]['jumlah'];
    $total_sub[$no_komponen] += $jumlah[0]['jumlah'];
    $no_komponen++;
  }
  $html .= '
          <td class="text-right">' . number_format($total_program, 0, ',', '.') . '</td>
        </tr>';
  $total += $total_program;
  $no++;
}
$html .= '
        <tr>
          <td></td>
          <td></td>';
$no_komponen = 0;
foreach ($komponen as $k) {
  $html .= '<td class="text-right">' . number_format($total_sub[$no_komponen], 0, ',', '.') . '</td>';
  $no_komponen++;
}
$html .= '
          <td class="text-right">' . number_format($total, 0, ',', '.') . '</td>
        </tr>
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
$dompdf->stream('Laporan Realisasi BOS ' . date('d M Y') . '.pdf');
// require('../../../view/tata_usaha/laporan/bos_pdf.php');
