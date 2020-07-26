<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $data = array(
    "uraian='" . $_POST['uraian'] . "'",
    "jumlah='" . $_POST['total'] . "'",
    "tanggal='" . $_POST['tanggal'] . "'",
  );

  $simpan = $crud->update('yayasan_realisasi_pemasukan_pengeluaran', $data, 'id_yayasan_realisasi_pemasukan_pengeluaran', $id);
  header('Location:' . $url . 'bendahara/yayasan/pengeluaran/');
  exit;
} else {
  $id = $_GET['ubah'];
  $pengeluaran = $crud->read_data('yayasan_realisasi_pemasukan_pengeluaran', ['id_yayasan_realisasi_pemasukan_pengeluaran' => $id]);
  // $pengeluaran = $crud->read_data('yayasan_rencana_pengeluaran');
  require('../../../view/bendahara/yayasan/pengeluaran_dana_form.php');
  // require('../../../view/bendahara/yayasan/pengeluaran_dana.php');
}
