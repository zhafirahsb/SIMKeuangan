<?php
session_start();
require('../url.php');
require('../model/crud.php');
$crud = new Crud;
$data = array(
  'tahun' => $_POST['tahun'],
  'jumlah_siswa' => $_POST['jumlah'],
  'dana_siswa' => $_POST['dana'],
  'tanggal_dibuat' => date('Y-m-d H:i:s'),
);
$standar = $crud->simpan('bos_rkas_rencana', $data);
// require('../view/perencanaan_bos.php');
header('Location:' . $url . 'perencanaan_bos');
