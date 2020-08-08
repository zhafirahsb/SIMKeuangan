<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$tahun = $_GET['tahun'];
$standar = $_GET['standar'];
$program = $crud->read_data('tbl_standar_nasional', ['idsnp' => $standar]);
$realisasi_komponen = $crud->read_data('bos_realisasi_komponen');
require('../../view/tata_usaha/detail_realisasi.php');
