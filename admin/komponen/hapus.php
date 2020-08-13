<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id = $_GET['komponen'];
$crud->delete('bos_realisasi_komponen', 'id_bos_realisasi_komponen', $id);
header('Location:' . $url . 'view/admin/komponen.php');
exit;
