<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$data = array(
  "nama_program='" . $_POST['program'] . "'",
);
$id = $_POST['id'];
$crud->update('tbl_standar_nasional', $data, 'idsnp', $id);
header('Location:' . $url . 'view/admin/standar.php');
exit;
