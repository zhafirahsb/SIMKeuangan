<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');


$crud = new Crud;
if (isset($_POST['submit'])) {
  $tipe = $_POST['tipe'];
  $tahun = $_POST['tahun'];
  if ($tipe == 'rencana') {
    $laporan = $crud->read_data('bos_rkas', ['tahun_ajaran' => $tahun]);
    $standar = $crud->read_data('tbl_standar_nasional');
    require('../../../view/tata_usaha/laporan/bos.php');
  } elseif ($tipe == 'realisasi') {
    $laporan1 = $crud->read_data('bos_realisasi_rekapitulasi', ['tahun_ajaran' => $tahun]);
    $standar = $crud->read_data('tbl_standar_nasional');
    $komponen = $crud->read_data('bos_realisasi_komponen');
    require('../../../view/tata_usaha/laporan/bos.php');
  }
} elseif (isset($_POST['pdf'])) {
  $tipe = $_POST['tipe'];
  $tahun = $_POST['tahun'];
  if ($tipe == 'rencana') {
    header('Location:' . $url . 'tata_usaha/laporan/bos/laporan_pdf.php?tahun=' . $tahun);
    exit;
  } elseif ($tipe == 'realisasi') {
    header('Location:' . $url . 'tata_usaha/laporan/bos/laporan_realisasi_pdf.php?tahun=' . $tahun);
    exit;
  }
} else {
  require('../../../view/tata_usaha/laporan/bos.php');
}
