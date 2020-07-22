<?php
require('../url.php');
require('../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {

  $realisasi = array(
    "idsnp'" . $_POST['standar'] . "'",
    "sub_program_id'" . $_POST['komponen'] . "'",
    // 'tahun_ajaran' => $_POST['tanggal'],
  );

  $idrea = $_POST['realisasi'];

  $crud->update('tbl_realisasi', $realisasi, 'id', $idrea);

  $detail_realisasi = array(
    "no_kode='" . $_POST['kode'] . "'",
    "no_bukti='" . $_POST['bukti'] . "'",
    "uraian='" . $_POST['uraian'] . "'",
    "jumlah='" . $_POST['jumlah'] . "'",
    "tanggal='" . $_POST['tanggal'] . "'",
  );

  // $crud->simpan('tbl_detail_relasi', $detail_realisasi);
  $crud->update('tbl_detail_relasi', $detail_realisasi, 'id', $_POST['detail']);
  header('Location:' . $url . 'realisasi');
}

$standar = $crud->read_data('tbl_standar_nasional');
$sub_program = $crud->read_data('tbl_sub_progran');

$id_realisasi = $_GET['realisasi'];
$detail_realisasi = $_GET['detail'];

$realisasi = $crud->read_data('tbl_realisasi', ['id' => $id_realisasi])[0];
$detail = $crud->read_data('tbl_detail_relasi', ['id' => $detail_realisasi])[0];

require('../view/realisasi_form.php');
