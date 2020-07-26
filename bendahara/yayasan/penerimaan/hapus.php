<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id = $_GET['spp'];
$crud->delete('yayasan_penerimaan_spp', 'id_yayasan_penerimaan_spp', $id);
header('Location:' . $url . 'bendahara/yayasan/penerimaan');
