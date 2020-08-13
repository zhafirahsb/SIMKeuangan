<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$data = array(
  'nama_program' => $_POST['program'],
);
$crud->simpan('tbl_standar_nasional', $data);
header('Location:' . $url . 'view/admin/standar.php');
