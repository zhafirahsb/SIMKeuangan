<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
$crud->delete('yayasan_realisasi_pengeluaran', 'id_yayasan_realisasi_pengeluaran', $_GET['id']);
header('Location:' . $url . 'view/bendahara/pengeluaran_yayasan.php');
