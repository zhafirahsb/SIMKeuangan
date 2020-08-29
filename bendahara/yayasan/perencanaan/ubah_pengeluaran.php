<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    "uraian='" . $_POST['detail_uraian'] . "'",
    "nilai_satuan='" . $_POST['jumlah_satuan'] . "'",
    "nilai_volume='" . $_POST['jumlah_volume'] . "'",
    "jumlah='" . $_POST['jumlah'] . "'",
    "total='" . $_POST['jumlah_satuan'] * $_POST['jumlah_volume'] * $_POST['jumlah'] . "'",
  );
  if (empty($_POST['detail_uraian']) || empty($_POST['jumlah_satuan']) || !is_numeric($_POST['jumlah_satuan']) || empty($_POST['jumlah_volume']) || !is_numeric($_POST['jumlah_volume']) || empty($_POST['jumlah'])) {
    $_SESSION['notice'] = 'Data yang Anda masukan salah !';
    header('Location:' . $url . 'view/bendahara/perencanaan_yayasan_ubah.php?id=' . $_POST['detail_rencana'] . '&tahun=' . $_POST['tahun']);
    exit;
  }
  $crud->update('yayasan_detail_rencana_pengeluaran', $data, 'id_yayasan_detail_rencana_pengeluaran', $_POST['detail_rencana']);
  header('Location:' . $url . 'view/bendahara/perencanaan_yayasan.php?tahun=' . $_POST['tahun']);
  exit;
}
