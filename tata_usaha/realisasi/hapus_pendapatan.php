<?php
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id_realisasi = $_GET['id'];
$crud->delete('bos_realisasi_pendapatan', 'id_bos_realisasi_pendapatan', $id_realisasi);
$crud->delete('bos_realisasi_rekapitulasi', 'tahun_ajaran', $_GET['tahun']);
header('Location:' . $url . 'tata_usaha/realisasi');
exit;
