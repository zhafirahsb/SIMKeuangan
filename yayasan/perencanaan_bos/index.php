<?php
session_start();
// require('../url.php');
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$standar = $crud->read_data('tbl_standar_nasional');
$pendapatan_belanja = $crud->pendapatan_belanja();
require('../../view/bendahara/perencanaan_bos.php');
