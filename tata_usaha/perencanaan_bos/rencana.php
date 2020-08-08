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
  'id_user' => $_SESSION['login'][1],
);
$standar = $crud->simpan('bos_rkas_rencana', $data);
for ($i = 1; $i <= 8; $i++) {
  $persentase = array(
    'tahun_ajaran' => $data['tahun'],
    'npsn' => $i,
    'persentase' => 0,
    'id_user' => $_SESSION['login'][1],
    'dibuat_tanggal' => date('Y-m-d H:i:s'),
  );
  $crud->simpan('tbl_persentase_standar_nasional', $persentase);
}

// require('../view/perencanaan_bos.php');
header('Location:' . $url . 'tata_usaha/perencanaan_bos');
