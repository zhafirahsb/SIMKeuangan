<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    'uraian' => $_POST['uraian'],
    'total' => $_POST['total'],
    'tanggal' => $_POST['tanggal'],
    // 'dibuat_tanggal' => date('Y-m-d H:i:s'),
    'id_user' => $_SESSION['login'][1],
  );
  $crud->simpan('yayasan_penerimaan_spp', $data);
  header('Location:' . $url . 'bendahara/yayasan/penerimaan');
} else {
  $spp = $_GET['spp'];
  $data = $crud->read_data('yayasan_penerimaan_spp', ['id' => $spp]);
  require('../../../view/bendahara/yayasan/penerimaan_dana_form.php');
}
