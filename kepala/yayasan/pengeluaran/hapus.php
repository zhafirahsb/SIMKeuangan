<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id = $_GET['pengeluaran'];
$crud->delete('yayasan_realisasi_pemasukan_pengeluaran', 'id', $id);
header('Location:' . $url . 'yayasan/pengeluaran');
