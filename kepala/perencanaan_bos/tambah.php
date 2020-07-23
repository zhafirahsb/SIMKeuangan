<?php
session_start();
require('../url.php');
require('../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $tipe = $_POST['tipe'];
  if ($tipe == 'belanja') {
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $nama_program = $_POST['nama_program'];
    $sub_program = $_POST['sub_program'];

    $data = array(
      'tahun_ajaran' => $tahun_ajaran,
      'npsn' => $nama_program,
      'sub_program' => $sub_program,
      'tipe' => $tipe,
      'dibuat_tanggal' => date('Y-m-d H:i:s'),
    );

    $id = $crud->simpan('bos_rkas', $data, true);

    $no_kode = $_POST['no_kode'];
    $uraian = $_POST['uraian'];
    $jumlah = $_POST['jumlah'];
    $no = 0;
    $detail = array();
    foreach ($uraian as $u) {
      $detail = array(
        'bos_rkas' => $id,
        'no_kode' => $no_kode[$no],
        'uraian' => $uraian[$no],
        'jumlah' => $jumlah[$no],
      );
      $crud->simpan('bos_rkas_detail', $detail);
      $no++;
    }
  } else {
    $data = array(
      'tahun_ajaran' => $tahun_ajaran,
      'tipe' => $tipe,
      'dibuat_tanggal' => date('Y-m-d H:i:s'),
    );

    $id = $crud->simpan('bos_rkas', $data, true);

    $detail = array(
      'bos_rkas' => $id,
      'jumlah' => $_POST['jumlah'],
    );
    $crud->simpan('bos_rkas_detail', $detail);
  }
  header('Location:' . $url . 'perencanaan_bos');
} else {
  $standar = $crud->read_data('tbl_standar_nasional');
  $dana = $crud->read_data('bos_rkas_rencana');
  require('../view/kepala/perencanaan_bos_form.php');
}
