<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
// $standar = $crud->query('tbl_persentase_standar_nasional ');
$nasional = $crud->read_data('tbl_standar_nasional');
$tahun_ajaran = $crud->query('SELECT DISTINCT(tahun_ajaran) FROM tbl_persentase_standar_nasional');
require('../../view/tata_usaha/standar_nasional.php');
