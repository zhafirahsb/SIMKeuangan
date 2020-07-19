<?php
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $satuan = $_POST['jumlah_satuan'];
  $volume = $_POST['jumlah_volume'];
  $jumlah = $_POST['jumlah'];
  $total = $satuan * $volume * $jumlah;
  $data = array(
    'tahun' => $_POST['tahun_ajaran'],
    'uraian' => $_POST['uraian'],
    'satuan' => $_POST['satuan'],
    'nilai_satuan' => $satuan,
    'volume' => $_POST['volume'],
    'nilai_volume' => $volume,
    'jumlah' => $_POST['jumlah'],
    'total' => !empty($_POST['total']) ? $_POST['total'] : $total,
    'dibuat_tanggal' => date('Y-m-d H:i:s'),
  );
  $crud->simpan('yayasan_rencana_pengeluaran', $data);
  header('Location:' . $url . 'yayasan/perencanaan/');
}
// $pengeluaran = $crud->read_data('yayasan_rencana_pengeluaran');
require('../../view/yayasan/perencanaan_dana_form.php');
