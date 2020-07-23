<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    'uraian' => $_POST['uraian'],
    'jumlah' => $_POST['total'],
    'tanggal' => $_POST['tanggal'],
    'dibuat_tanggal' => date('Y-m-d H:i:s'),
  );
  $crud->simpan('yayasan_realisasi_pemasukan_pengeluaran', $data);
  header('Location:' . $url . 'bendahara/yayasan/pengeluaran');
} else {
  $pengeluaran = $crud->read_data('yayasan_realisasi_pemasukan_pengeluaran');
  require('../../../view/bendahara/yayasan/pengeluaran_dana.php');
}
