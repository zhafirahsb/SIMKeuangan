<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id = $_POST['id'];
$crud->update('bos_realisasi_komponen', ["nama_program='" . $_POST['komponen'] . "'"], 'id_bos_realisasi_komponen', $id);
header('Location:' . $url . 'view/admin/komponen.php');
exit;
