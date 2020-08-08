<?php
session_start();
require('../../proses/function.php');
cek_session();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
// $standar = $crud->read_data('tbl_standar_nasional');
if (isset($_POST['submit'])) {
  $tahun = $_POST['tahun_ajaran'];
  $rkas_rencana1 = $crud->read_data('bos_rkas_rencana', ['tahun' => $tahun]);
}
if (isset($_GET['tahun'])) {
  $tahun = $_GET['tahun'];
  $rkas_rencana1 = $crud->read_data('bos_rkas_rencana', ['tahun' => $tahun]);
}
$rkas_rencana = $crud->read_data('bos_rkas_rencana');
$pendapatan_belanja = $crud->pendapatan_belanja();
require('../../view/tata_usaha/perencanaan_bos.php');
