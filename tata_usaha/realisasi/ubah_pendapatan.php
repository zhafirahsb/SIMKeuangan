<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {

  $realisasi = array(
    "tahun='" . $_POST['tahun'] . "'",
    "nominal='" . $_POST['jumlah_dana'] . "'",
    // 'tahun_ajaran' => $_POST['tanggal'],
  );

  $idrea = $_POST['realisasi'];

  $crud->update('bos_realisasi_pendapatan', $realisasi, 'id_bos_realisasi_pendapatan', $idrea);

  header('Location:' . $url . 'tata_usaha/realisasi/');
  exit;
}
$id = $_GET['id'];
$pendapatan = $crud->read_data('bos_realisasi_pendapatan', ['id_bos_realisasi_pendapatan' => $id]);

require('../../view/tata_usaha/realisasi_pendapatan_form.php');
