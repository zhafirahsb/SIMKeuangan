<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
require('../../../dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$crud = new Crud;
$tahun = $_GET['tahun'];
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
  <h4 class="mt-4 text-center">Rencana Anggaran Pendapatan SMP Muhammadiyah 19 T.A. ' . $tahun . '</h4>
  <table class="table table-bordered mt-3">
    <thead>
      <tr class="text-center">
        <th>No</th>
        <th>Keterangan</th>
        <th colspan="7">Uraian</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>';
// $pendapatan = get_rencana_pendapatan_yys();
$pendapatan = $crud->read_data('yayasan_rencana_pendapatan', ['tahun' => $tahun]);
if ($pendapatan) {
  $no = 0;
  $jumlah_pendapatan = 0;
  foreach ($pendapatan as $p) {
    $jumlah_pendapatan += $p['jumlah_siswa'] * $p['jumlah_iuran'] * 12;
    $html .=
      '<tr>
        <td>' . ($no + 1) . '</td>
        <td>' . $p['keterangan'] . '</td>
        <td>' . ($p['jumlah_siswa'] > 0 ? $p['jumlah_siswa'] : '') . '</td>
        <td>' . ($p['jumlah_siswa'] > 0 ? 'sis' : '') . '</td>
        <td>' . ($p['jumlah_siswa'] > 0 ? 'x' : '') . '</td>
        <td>' . ($p['jumlah_siswa'] > 0 ? '12' : '') . '</td>
        <td>' . ($p['jumlah_siswa'] > 0 ? 'x' : '') . '</td>
        <td>' . ($p['jumlah_siswa'] > 0 ? 'bln' : '') . '</td>
        <td>Rp. ' . number_format($p['jumlah_iuran'], 0, ',', '.') . '</td>
        <td>Rp. ' . number_format($p['jumlah_siswa'] > 0 ? $p['jumlah_siswa'] * $p['jumlah_iuran'] * 12 : $p['jumlah_iuran'], 0, ',', '.') . '</td>
      </tr>';
    $no++;
  }
  $html .= '<tr>
    <td>' . ($no + 1) . '</td>
    <th>Uang Iuran Sekolah Kelas VII - IX</th>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <th>Rp. ' . number_format($jumlah_pendapatan, 0, ',', '.') . '</th>
  </tr>';
} else {
  $html .= '
  <tr>
    <td colspan="5" class="text-center">
      Belum Ada data
    </td>
  </tr>';
}
$html .= '
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
$dompdf->stream('Laporan Rencana Pemasukan Yayasan ' . date('d M Y') . '.pdf');
// require('../../../view/tata_usaha/laporan/bos_pdf.php');
