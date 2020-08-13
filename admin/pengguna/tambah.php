<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$data = array(
  'username' => $_POST['username'],
  'password' => md5($_POST['password']),
  'role' => $_POST['jabatan'],
);
$crud->simpan('tbl_user', $data);
header('Location:' . $url . 'view/admin/pengguna.php');
