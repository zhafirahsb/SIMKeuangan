<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    'tahun' => $_POST['tahun'],
    'keterangan' => $_POST['keterangan'],
    'jumlah_siswa' => $_POST['siswa'],
    'jumlah_iuran' => $_POST['iuran'],
    'dibuat_tanggal' => date('Y-m-d H:i:s'),
    'id_user' => $_SESSION['login'][1]
  );
  $simpan = $crud->simpan('yayasan_rencana_pendapatan', $data);
  header('Location:' . $url . 'view/bendahara/perencanaan_yayasan.php');
}
