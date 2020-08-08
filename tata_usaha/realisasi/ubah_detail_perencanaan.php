<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $id = $_POST['detailrencana'];
  $rencana = array(
    "no_kode='" . $_POST['nokode'] . "'",
    "uraian='" . $_POST['sub'] . "'",
    "jumlah='" . $_POST['jumlah'] . "'",
  );
  $crud->update('bos_realisasi_detail_komponen', $rencana, 'id_bos_realisasi_detail_komponen', $id);
  header('Location:' . $url . 'tata_usaha/realisasi/detail.php?tahun=' . $_POST['tahun'] . '&standar=' . $_POST['standar']);
  exit;
}
