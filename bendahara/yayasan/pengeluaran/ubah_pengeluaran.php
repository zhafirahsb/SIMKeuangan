<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $crud = new Crud;
  $data = array(
    "uraian='" . $_POST['uraian'] . "'",
    "jenis_biaya='" . $_POST['jenis'] . "'",
    "tanggal='" . $_POST['tanggal'] . "'",
    "jumlah='" . $_POST['jumlah'] . "'",
  );
  if (empty($_POST['tanggal']) || empty($_POST['uraian']) || empty($_POST['jenis']) || empty($_POST['jumlah']) || !is_numeric($_POST['jumlah'])) {
    $_SESSION['notice'] = 'Data yang Anda masukan salah !';
    header('Location:' . $url . 'view/bendahara/pengeluaran_yayasan_form.php?id=' . $_POST['id']);
    exit;
  }
  $crud->update('yayasan_realisasi_pengeluaran', $data, 'id_yayasan_realisasi_pengeluaran', $_POST['id']);
  header('Location:' . $url . 'view/bendahara/pengeluaran_yayasan.php');
}
