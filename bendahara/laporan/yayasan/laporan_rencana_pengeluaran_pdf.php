<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
require('../../../dompdf/autoload.inc.php');
require('../../../proses/yayasan.php');

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
  <h4 class="text-center mb-3">Rencana Pengeluaran SMP Muhammadiyah 19 T.A. ' . $tahun . '</h4>
        <table class="table table-bordered mt-3">
          <thead>
            <tr class="text-center">
              <th>Kode</th>
              <th>Uraian</th>
              <th>Satuan</th>
              <th>Volume</th>
              <th>Jumlah</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>';
$rencana = get_detail_rencana_pengeluaran(['tahun' => $tahun]);
if ($rencana) {
  $jenis_biaya = get_jenis_biaya();
  $i = 1;
  foreach ($jenis_biaya as $jb) {
    $html .= '
    <tr>
      <th>' . $i . '</th>
      <th>' . $jb['jenis_biaya'] . '</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>';
    if ($jb['jenis_biaya'] == 'Biaya Bantuan' || $jb['jenis_biaya'] == 'Biaya Lainnya') {
      $uraian = get_uraian_rencana(['jenis_biaya' => $jb['jenis_biaya'], 'yayasan_detail_rencana_pengeluaran.tahun' => $tahun]);
      if ($uraian) {
        $j = 1;
        foreach ($uraian as $u) {
          $html .= '
          <tr>
            <th>' . $i . ' . ' . $j . '</th>
            <td>' . $u['uraian'] . '</td>
            <td>' . $u['nilai_satuan'] . ' ' . $u['satuan'] . '</td>
            <td>' . $u['nilai_volume'] . ' ' . $u['volume'] . '</td>
            <td>Rp ' . $u['jumlah'] . '</td>
            <td>Rp ' . $u['total'] . '</td>
          </tr>';
          $j++;
        }
      }
    } else {
      $sub_jenis_biaya = get_sub_jenis_biaya(['jenis_biaya' => $jb['jenis_biaya']]);
      $j = 1;
      foreach ($sub_jenis_biaya as $sjb) {
        $html .= '
        <tr>
          <th>' . $i . ' . ' . $j . '</th>
          <th>' . $sjb['sub_jenis_biaya'] . '</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>';
        if ($sjb['id_yayasan_rencana_pengeluaran'] > 2) {
          $uraian = get_uraian_rencana(['sub_jenis_biaya' => $sjb['sub_jenis_biaya'], 'tahun' => $tahun]);
          if ($uraian) {
            $k = 1;
            foreach ($uraian as $u) {
              $html .= '<tr>
                <th>' . $i . ' . ' . $j . ' . ' . $k . '</th>
                <td>' . $k . '. ' . $u['uraian'] . '</td>
                <td>' . $u['nilai_satuan'] . ' ' . $u['satuan'] . '</td>
                <td>' . $u['nilai_volume'] . ' ' . $u['volume'] . '</td>
                <td>Rp ' . $u['jumlah'] . '</td>
                <td>Rp ' . $u['total'] . '</td>
              </tr>';
              $k++;
            }
          }
        } else {
          $masa_kerja = get_masa_kerja();
          $k = 1;
          foreach ($masa_kerja as $mk) {
            $data_uraian = ['sub_jenis_biaya' => $sjb['sub_jenis_biaya'], 'tahun' => $tahun, 'masa_kerja' => $mk];
            $html .= '
            <tr>
              <th>' . $i . ' . ' . $j . ' . ' . $k . '</th>
              <th>' . $mk . '</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>';
            // $uraian = get_uraian_rencana($data_uraian);
            $uraian = $crud->query("SELECT * FROM yayasan_rencana_pengeluaran LEFT JOIN yayasan_detail_rencana_pengeluaran ON yayasan_rencana_pengeluaran.id_yayasan_rencana_pengeluaran=yayasan_detail_rencana_pengeluaran.id_rencana_pengeluaran WHERE yayasan_rencana_pengeluaran.sub_jenis_biaya = '" . $sjb['sub_jenis_biaya'] . "' AND yayasan_detail_rencana_pengeluaran.tahun = '" . $tahun . "' AND masa_kerja = '" . $mk . "'");
            $l = 1;
            foreach ($uraian as $u) {
              // var_dump($u);
              $html .= '
              <tr>';
              if ($sjb['sub_jenis_biaya'] == "") {
                $html .= "<td>$i . $j</td>";
              } else {
                $html .= '<td>' . $i . ' . ' . $j . ' . ' . $k . ' . ' . $l . '</td>';
              }
              $html .= '<td>' . $l . '. ' . $u['uraian'] . '</td>
              <td>' . $u['nilai_satuan'] . ' ' . $u['satuan'] . '</td>
              <td>' . $u['nilai_volume'] . ' ' . $u['volume'] . '</td>
              <td>Rp ' . $u['jumlah'] . '</td>
              <td>Rp ' . $u['total'] . '</td>
              </tr>';
              $l++;
            }
            $k++;
          }
        }
        $j++;
      }
    }
    $i++;
  }
} else {
  $html .= '
  <tr class="text-center">
    <td colspan="7">Belum Ada Data</td>
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
