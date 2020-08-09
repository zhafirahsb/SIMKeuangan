<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
$crud->delete('yayasan_rencana_pendapatan', 'id_yayasan_rencana_pendapatan', $_GET['id']);
header('Location:' . $url . 'view/bendahara/perencanaan_yayasan.php?tahun=' . $_GET['tahun']);
