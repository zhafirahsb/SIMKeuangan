<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    'tahun' => $_POST['tahun'],
    'nominal' => $_POST['jumlah_dana'],
  );
  $crud->simpan('bos_realisasi_pendapatan', $data);
  header('Location:' . $url . 'tata_usaha/realisasi/');
  exit;
} else {
  $realisasi = $crud->reliasasi_bos();
  // print_r($realisasi);
  // die;
  $pendapatan = $crud->read_data('bos_realisasi_pendapatan');
  require('../../view/tata_usaha/realisasi.php');
}
