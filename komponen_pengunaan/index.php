<?php
require('../url.php');
require('../model/crud.php');
$crud = new Crud;
$standar = $crud->read_data('tbl_standar_nasional');
require('../view/komponen_pengunaan.php');
