<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $id = $_POST['rencana'];
  $rencana = array(
    "sub_program_id='" . $_POST['subprogram'] . "'",
  );
  $crud->update('bos_realisasi_rekapitulasi', $rencana, 'id_bos_realisasi_rekapitulasi', $id);
  header('Location:' . $url . 'tata_usaha/realisasi/detail.php?tahun=' . $_POST['tahun'] . '&standar=' . $_POST['standar']);
  exit;
}
