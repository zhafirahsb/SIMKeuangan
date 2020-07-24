<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
if (isset($_POST['submit'])) {
  $crud = new Crud;
  $tahun = $_POST['tahun'];
  $crud->report_realisasi();
}
require('../../../view/kepala/laporan/bos.php');
