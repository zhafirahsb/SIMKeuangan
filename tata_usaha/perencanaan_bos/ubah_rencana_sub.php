<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $id = $_POST['rencana'];
  $rencana = array(
    "sub_program='" . $_POST['subprogram'] . "'",
  );
  $crud->update('bos_rkas', $rencana, 'id_bos_rkas', $id);
  header('Location:' . $url . 'tata_usaha/perencanaan_bos/detail_perencanaan.php?tahun=' . $_POST['tahun'] . '&standar=' . $_POST['standar']);
  exit;
}
