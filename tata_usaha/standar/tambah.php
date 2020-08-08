<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  for ($i = 0; $i < count($_POST['standar']); $i++) {
    $data = array(
      'tahun_ajaran' => $_POST['tahun'],
      'npsn' => $_POST['standar'][$i],
      'persentase' => $_POST['persentase'][$i],
      'id_user' => $_SESSION['login'][1],
      'dibuat_tanggal' => date('Y-m-d H:i:s'),
    );
    $crud->simpan('tbl_persentase_standar_nasional', $data);
  }
  header('Location:' . $url . 'tata_usaha/standar/');
}
