<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $rencana = array(
    "persentase='" . $_POST['persentase'] . "'",
  );

  if (empty($_POST['persentase']) || !is_numeric($_POST['persentase'])) {
    $_SESSION['notice1'] = 'Data yang Anda masukan salah !';
    header('Location:' . $url . 'tata_usaha/perencanaan_bos/index.php?tahun=' . $_POST['tahun']);
    exit;
  }
  $crud->update('tbl_persentase_standar_nasional', $rencana, 'id_persentase_standar_nasional', $id);

  header('Location:' . $url . 'tata_usaha/perencanaan_bos/index.php?tahun=' . $_POST['tahun']);
  exit;
}
