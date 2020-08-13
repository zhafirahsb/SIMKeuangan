<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id = $_GET['user'];
$crud->delete('tbl_user', 'id_user', $id);
header('Location:' . $url . 'view/admin/pengguna.php');
exit;
