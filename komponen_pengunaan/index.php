<?php
require('../url.php');
require('../model/crud.php');
$crud = new Crud;
$standar = $crud->read_data('bos_realisasi_komponen');
require('../view/komponen_pengunaan.php');
