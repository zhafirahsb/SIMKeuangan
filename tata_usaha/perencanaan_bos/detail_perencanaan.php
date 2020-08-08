<?php
session_start();
// require('../url.php');
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$tahun = $_GET['tahun'];
$nbsp = $_GET['standar'];
$detail = $crud->query("SELECT * FROM tbl_standar_nasional  WHERE idsnp = '" . $nbsp . "'");
// $rkas_rencana = $crud->read_data('bos_rkas_rencana');
// $pendapatan_belanja = $crud->pendapatan_belanja();
require('../../view/tata_usaha/detail_perencanaan.php');
