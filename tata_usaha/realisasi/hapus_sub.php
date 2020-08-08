<?php
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id = $_GET['detail'];
$crud->delete('bos_realisasi_rekapitulasi', 'id_bos_realisasi_rekapitulasi', $id);
// header('Location:' . $url . 'realisasi');
header('Location:' . $url . 'tata_usaha/realisasi/detail.php?tahun=' . $_GET['tahun'] . '&standar=' . $_GET['standar']);
exit;
