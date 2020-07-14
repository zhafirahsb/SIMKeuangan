<?php
require('../url.php');
require('../model/crud.php');
$crud = new Crud;
$standar = $crud->read_data('tbl_sub_progran');
require('../view/komponen_pengunaan.php');
