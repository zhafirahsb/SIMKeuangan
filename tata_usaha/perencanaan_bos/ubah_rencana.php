<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $id = $_POST['rencana'];
  $rencana = array(
    "tahun='" . $_POST['tahun'] . "'",
    "jumlah_siswa='" . $_POST['jumlah'] . "'",
    "dana_siswa='" . $_POST['dana'] . "'",
    "total='" . $_POST['jumlah'] * $_POST['dana'] . "'",
  );

  $crud->update('bos_rkas_rencana', $rencana, 'id_bos_rkas_rencana', $id);

  header('Location:' . $url . 'tata_usaha/perencanaan_bos/');
  exit;
}
