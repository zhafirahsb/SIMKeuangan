<?php
session_start();
require('../../proses/function.php');
cek_session();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$standar = $crud->read_data('bos_realisasi_komponen');
require('../../view/tata_usaha/komponen_pengunaan.php');
