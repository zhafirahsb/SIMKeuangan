<?php
session_start();
require('../../proses/function.php');
cek_session();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
// $standar = $crud->read_data('tbl_standar_nasional');
$rkas_rencana = $crud->read_data('bos_rkas_rencana');
// $standar = $crud->read_data('tbl_standar_nasional');
require('../../view/tata_usaha/model.php');
