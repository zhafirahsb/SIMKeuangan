<?php
require('../url.php');
require('../model/crud.php');
$crud = new Crud;
$id_realisasi = $_GET['realisasi'];
$crud->delete('tbl_realisasi', 'id', $id_realisasi);
header('Location:' . $url . 'realisasi');
