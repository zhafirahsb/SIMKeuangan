<?php
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    'uraian' => $_POST['uraian'],
    'total' => $_POST['total'],
    'tanggal' => $_POST['tanggal'],
    'dibuat_tanggal' => date('Y-m-d H:i:s'),
  );
  $crud->simpan('yayasan_penerimaan_spp', $data);
  header('Location:' . $url . 'yayasan/penerimaan');
} else {
  $spp = $crud->read_data('yayasan_penerimaan_spp');
  require('../../view/yayasan/penerimaan_dana.php');
}
