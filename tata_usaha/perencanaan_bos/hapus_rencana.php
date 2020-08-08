<?php
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id = $_GET['rencana'];
$tahun = $_GET['tahun'];
$crud->delete('bos_rkas_rencana', 'id_bos_rkas_rencana', $id);
$crud->delete('bos_rkas', 'tahun_ajaran', $tahun);
$crud->delete('tbl_persentase_standar_nasional', 'tahun_ajaran', $tahun);
header('Location:' . $url . 'tata_usaha/perencanaan_bos');
exit;
