<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
// $crud->read_data('')
require('../../../view/bendahara/laporan/bos.php');
