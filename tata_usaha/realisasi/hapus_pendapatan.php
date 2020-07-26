<?php
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id_realisasi = $_GET['realisasi'];
$crud->delete('bos_realisasi_pendapatan', 'id_bos_realisasi_pendapatan', $id_realisasi);
header('Location:' . $url . 'tata_usaha/realisasi');
exit;
