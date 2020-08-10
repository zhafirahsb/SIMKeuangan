<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $crud = new Crud;
  $data = array(
    "uraian='" . $_POST['uraian'] . "'",
    "tanggal='" . $_POST['tanggal'] . "'",
    "jumlah='" . $_POST['jumlah'] . "'",
  );
  $crud->update('yayasan_realisasi_pengeluaran', $data, 'id_yayasan_realisasi_pengeluaran', $_POST['id']);
  header('Location:' . $url . 'view/bendahara/pengeluaran_yayasan.php');
}
