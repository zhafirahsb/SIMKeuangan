<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$id = $_GET['standar'];
$crud->delete('tbl_standar_nasional', 'idsnp', $id);
header('Location:' . $url . 'view/admin/standar.php');
exit;
