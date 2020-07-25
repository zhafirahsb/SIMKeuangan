<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$user = $crud->read_data('tbl_user');
require('../../view/admin/data_pengguna.php');
