<?php
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$realisasi = $crud->reliasasi_bos();
require('../../view/tata_usaha/realisasi.php');
