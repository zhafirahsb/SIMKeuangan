<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$komponen = $crud->read_data('bos_realisasi_komponen');
require('../../view/admin/data_komponen.php');
