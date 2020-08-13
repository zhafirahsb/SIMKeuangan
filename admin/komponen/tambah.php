<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$data = array(
  'nama_program' => $_POST['komponen'],
);
$crud->simpan('bos_realisasi_komponen', $data);
header('Location:' . $url . 'view/admin/komponen.php');
