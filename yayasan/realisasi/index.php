<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$realisasi = $crud->reliasasi_bos();
require('../../view/bendahara/realisasi.php');
