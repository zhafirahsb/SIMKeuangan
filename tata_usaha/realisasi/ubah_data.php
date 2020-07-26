<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {

  $realisasi = array(
    "idsnp'" . $_POST['standar'] . "'",
    "sub_program_id'" . $_POST['komponen'] . "'",
    // 'tahun_ajaran' => $_POST['tanggal'],
  );

  $idrea = $_POST['realisasi'];

  $crud->update('bos_realisasi_rekapitulasi', $realisasi, 'id_bos_realisasi_rekapitulasi', $idrea);

  $detail_realisasi = array(
    "no_kode='" . $_POST['kode'] . "'",
    "no_bukti='" . $_POST['bukti'] . "'",
    "uraian='" . $_POST['uraian'] . "'",
    "jumlah='" . $_POST['jumlah'] . "'",
    "tanggal='" . $_POST['tanggal'] . "'",
  );

  // $crud->simpan('tbl_detail_relasi', $detail_realisasi);
  $crud->update('bos_realisasi_detail_komponen', $detail_realisasi, 'id_bos_realisasi_detail_komponen', $_POST['detail']);
  header('Location:' . $url . 'tata_usaha/realisasi/');
  exit;
}

$standar = $crud->read_data('tbl_standar_nasional');
$sub_program = $crud->read_data('bos_realisasi_komponen');

$id_realisasi = $_GET['realisasi'];
$detail_realisasi = $_GET['detail'];

// $realisasi = $crud->read_data('tbl_realisasi', ['id' => $id_realisasi])[0];
// $detail = $crud->read_data('tbl_detail_relasi', ['id' => $detail_realisasi])[0];
$realisasi = $crud->read_data('bos_realisasi_rekapitulasi', ['id_bos_realisasi_rekapitulasi' => $id_realisasi])[0];
$detail = $crud->read_data('bos_realisasi_detail_komponen', ['id_bos_realisasi_detail_komponen' => $detail_realisasi])[0];
require('../../view/tata_usaha/realisasi_form.php');
