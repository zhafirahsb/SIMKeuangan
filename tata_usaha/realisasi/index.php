<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    'tahun' => $_POST['tahun'],
    'nominal' => $_POST['jumlah_dana'],
    'id_user' => $_SESSION['login'][1],
    'dibuat_tanggal' => date('Y-m-d H:i:s')
  );
  if (empty($_POST['jumlah_dana']) || !is_numeric($_POST['jumlah_dana'])) {
    $_SESSION['notice'] = 'Data yang Anda masukan salah !';
    header('Location:' . $url . 'tata_usaha/realisasi/');
    exit;
  }
  $crud->simpan('bos_realisasi_pendapatan', $data);
  header('Location:' . $url . 'tata_usaha/realisasi/');
  exit;
} elseif (isset($_POST['data'])) {
  $pendapatan1 = $crud->read_data('bos_realisasi_pendapatan', ['tahun' => $_POST['tahun_ajaran']]);
  $standar = $crud->read_data('tbl_standar_nasional');
  // require('../../view/tata_usaha/realisasi.php');
}
$pendapatan = $crud->read_data('bos_realisasi_pendapatan');
require('../../view/tata_usaha/realisasi.php');
