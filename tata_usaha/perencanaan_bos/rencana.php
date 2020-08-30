<?php
session_start();
require('../../proses/function.php');
cek_session();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
$data = array(
  'tahun' => $_POST['tahun'],
  'jumlah_siswa' => $_POST['jumlah'],
  'dana_siswa' => $_POST['dana'],
  'tanggal_dibuat' => date('Y-m-d H:i:s'),
  'total' => $_POST['jumlah'] * $_POST['dana'],
  // 'saldo_tahun_lalu' => $_POST['saldo'],
  'id_user' => $_SESSION['login'][1],
);

if (empty($data['jumlah_siswa']) || empty($data['dana_siswa'])) {
  $_SESSION['notice'] = 'Data yang Anda masukan salah !';
  header('Location:' . $url . 'tata_usaha/perencanaan_bos');
  exit;
}

$crud->simpan('bos_rkas_rencana', $data);
$standar = $crud->read_data('tbl_standar_nasional');

$total_dana_rencana1 = $crud->query("SELECT SUM(jumlah) jumlah FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id_bos_rkas = bos_rkas_detail.bos_rkas WHERE bos_rkas.tahun_ajaran = '2017'")[0]['jumlah'];
$total_dana_rencana2 = $crud->query("SELECT SUM(jumlah) jumlah FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id_bos_rkas = bos_rkas_detail.bos_rkas WHERE bos_rkas.tahun_ajaran = '2018'")[0]['jumlah'];

foreach ($standar as $st) {



  $persentase = array(
    'tahun_ajaran' => $data['tahun'],
    'npsn' => $st['idsnp'],
    // 'persentase' => 0,
    'id_user' => $_SESSION['login'][1],
    'dibuat_tanggal' => date('Y-m-d H:i:s'),
  );

  if ($data['tahun'] > 2018) {
    $tahun1 = $data['tahun'] - 1;
    $tahun2 = $data['tahun'] - 2;
    $dana_rencana1 = $crud->query("SELECT SUM(jumlah) jumlah FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id_bos_rkas = bos_rkas_detail.bos_rkas WHERE bos_rkas.npsn = '" . $st['idsnp'] . "' AND bos_rkas.tahun_ajaran = '" . $tahun2 . "'")[0]['jumlah'];
    $dana_rencana2 = $crud->query("SELECT SUM(jumlah) jumlah FROM bos_realisasi_rekapitulasi JOIN bos_realisasi_detail_komponen ON bos_realisasi_rekapitulasi.id_bos_realisasi_rekapitulasi = bos_realisasi_detail_komponen.relasi_id WHERE bos_realisasi_rekapitulasi.idsnp = '" . $st['idsnp'] . "' AND bos_realisasi_rekapitulasi.tahun_ajaran = '" . $tahun1 . "'")[0]['jumlah'];
    $persentase1 = ($dana_rencana1 / $total_dana_rencana1) * 100;
    $persentase2 = ($dana_rencana2 / $total_dana_rencana2) * 100;
    $persentase['persentase'] = ($persentase1 + $persentase2) / 2;
  } else {
    $persentase['persentase'] = 0;
  }


  $crud->simpan('tbl_persentase_standar_nasional', $persentase);
}
header('Location:' . $url . 'tata_usaha/perencanaan_bos');
exit;
