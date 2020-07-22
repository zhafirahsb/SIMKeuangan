<?php
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id = $_GET['spp'];
$crud->delete('yayasan_penerimaan_spp', 'id', $id);
header('Location:' . $url . 'yayasan/penerimaan');
