<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    "persentase=" . $_POST['persentase'] . "",
  );
  $crud->update('tbl_persentase_standar_nasional', $data, 'id_persentase_standar_nasional', $_POST['standar']);
  header('Location:' . $url . 'tata_usaha/standar/');
  exit;
}
