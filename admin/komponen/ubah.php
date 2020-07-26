<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $id = $_POST['komponen'];
  $crud->update('bos_realisasi_komponen', ["nama_program='" . $_POST['nama'] . "'"], 'id_bos_realisasi_komponen', $id);
  header('Location:' . $url . 'admin/komponen/');
  exit;
}
$id = $_GET['komponen'];
$komponen = $crud->read_data('bos_realisasi_komponen', ['id_bos_realisasi_komponen' => $id]);
require('../../view/admin/data_komponen_form.php');
