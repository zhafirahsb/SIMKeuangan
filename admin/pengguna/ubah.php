<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$data = array(
  "username='" . $_POST['username'] . "'",
  "role='" . $_POST['jabatan'] . "'",
);
$id = $_POST['id'];
$crud->update('tbl_user', $data, 'id_user', $id);
header('Location:' . $url . 'view/admin/pengguna.php');
exit;
