<?php
session_start();
require('../url.php');
require('../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $realisasi = array(
    'idsnp' => $_POST['standar'],
    'sub_program_id' => $_POST['komponen'],
    // 'tahun_ajaran' => $_POST['tanggal'],
  );

  $realisasi_id = $crud->simpan('bos_realisasi_rekapitulasi', $realisasi, true);

  $detail_realisasi = array(
    'relasi_id' => $realisasi_id,
    'no_kode' => $_POST['kode'],
    'no_bukti' => $_POST['bukti'],
    'uraian' => $_POST['uraian'],
    'jumlah' => $_POST['jumlah'],
    'tanggal' => $_POST['tanggal'],
  );

  $crud->simpan('bos_realisasi_detail_komponen', $detail_realisasi);
  header('Location:' . $url . 'realisasi');
}
$standar = $crud->read_data('tbl_standar_nasional');
$sub_program = $crud->read_data('bos_realisasi_komponen');
require('../view/realisasi_form.php');
