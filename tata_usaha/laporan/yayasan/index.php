<?php
session_start();
require('../../../url.php');
require('../../../proses/yayasan.php');
require('../../../model/crud.php');

$crud = new Crud;
$tahun = 2017;
$tahun1 = 2017;
$pendapatan = $crud->read_data('yayasan_rencana_pendapatan', ['tahun' => $tahun]);
$rencana = get_detail_rencana_pengeluaran(['tahun' => $tahun1]);
if (isset($_POST['submit'])) {
  $tipe = $_POST['tipe'];
  if ($tipe == 'rencana_pemasukan') {
    $tahun = $_POST['tahun'];
    $pendapatan = $crud->read_data('yayasan_rencana_pendapatan', ['tahun' => $tahun]);
  } elseif ($tipe == 'rencana_pengeluaran') {
    $tahun1 = $_POST['tahun'];
    $rencana = get_detail_rencana_pengeluaran(['tahun' => $tahun1]);
  } elseif ($tipe == 'realisasi') {
    $tahun2 = $_POST['tahun'];
    $bulan2 = $_POST['bulan'];
    $spp = $crud->query("SELECT * FROM yayasan_penerimaan_spp WHERE YEAR(tanggal) = '" . $tahun2 . "' AND MONTH(tanggal) = '" . $bulan2 . "'  ORDER BY tanggal ASC");
    $pengeluaran = $crud->query("SELECT * FROM yayasan_realisasi_pengeluaran WHERE YEAR(tanggal) = '" . $tahun2 . "' AND MONTH(tanggal) = '" . $bulan2 . "' ORDER BY tanggal ASC");
    $baris = count($spp);
    if ($baris < count($pengeluaran)) {
      $baris = count($pengeluaran);
    }
  }
} elseif (isset($_POST['pdf'])) {
  $tipe = $_POST['tipe'];
  $tahun = $_POST['tahun'];
  if ($tipe == 'rencana_pemasukan') {
    header('Location:' . $url . 'bendahara/laporan/yayasan/laporan_rencana_pemasukan_pdf.php?tahun=' . $tahun);
    exit;
  } elseif ($tipe == 'rencana_pengeluaran') {
    header('Location:' . $url . 'bendahara/laporan/yayasan/laporan_rencana_pengeluaran_pdf.php?tahun=' . $tahun);
    exit;
  } elseif ($tipe == 'realisasi') {
    header('Location:' . $url . 'bendahara/laporan/yayasan/laporan_realiasasi_pdf.php?tahun=' . $tahun . '&bulan=' . $_POST['bulan']);
    exit;
  }
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
require('../../../view/tata_usaha/laporan/yayasan.php');
