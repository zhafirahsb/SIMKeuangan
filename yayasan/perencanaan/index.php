<?php
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    'tahun' => $_POST['tahun'],
    'keterangan' => $_POST['keterangan'],
    'jumlah_siswa' => $_POST['jml_siswa'],
    'jumlah_iuran' => $_POST['jml_dana'],
    'dibuat_tanggal' => date('Y-m-d H:i:s'),
  );

  $crud->simpan('yayasan_rencana_pendapatan', $data);
  header('Location:' . $url . 'yayasan/perencanaan/');
}
$pendapatan = $crud->read_data('yayasan_rencana_pendapatan');
$pengeluaran = $crud->read_data('yayasan_rencana_pengeluaran');
require('../../view/yayasan/perencanaan_dana.php');
