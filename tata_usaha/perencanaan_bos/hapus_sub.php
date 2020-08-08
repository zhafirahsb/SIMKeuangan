<?php
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id = $_GET['detail'];
$crud->delete('bos_rkas', 'id_bos_rkas', $id);
// header('Location:' . $url . 'realisasi');
header('Location:' . $url . 'tata_usaha/perencanaan_bos/detail_perencanaan.php?tahun=' . $_GET['tahun'] . '&standar=' . $_GET['standar']);
exit;
