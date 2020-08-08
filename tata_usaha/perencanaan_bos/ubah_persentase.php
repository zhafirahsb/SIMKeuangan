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

  $crud->update('tbl_persentase_standar_nasional', $rencana, 'id_persentase_standar_nasional', $id);

  header('Location:' . $url . 'tata_usaha/perencanaan_bos/index.php?tahun=' . $_POST['tahun']);
  exit;
}
