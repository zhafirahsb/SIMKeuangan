<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $realisasi = array(
    'idsnp' => $_POST['standar'],
    'sub_program_id' => $_POST['komponen'],
    'id_user' => $_SESSION['login'][1],
    'tahun_ajaran' => $_POST['tahun'],
    'dibuat_tanggal' => date('Y-m-d'),
    // 'tahun_ajaran' => $_POST['tanggal'],
  );

  for ($i = 0; $i < count($_POST['kode']); $i++) {
    if (empty($_POST['kode'][$i]) || empty($_POST['bukti'][$i]) || empty($_POST['uraian'][$i]) || empty($_POST['jumlah'][$i]) || !is_numeric($_POST['jumlah'][$i]) || empty($_POST['tanggal'][$i])) {
      $_SESSION['notice'] = 'Data yang Anda masukan salah !';
      header('Location:' . $url . 'tata_usaha/realisasi/tambah_data.php');
      exit;
    }
  }

  $cek = $crud->read_data('bos_realisasi_rekapitulasi', ['idsnp' => $realisasi['idsnp'], 'sub_program_id' => $realisasi['sub_program_id'], 'tahun_ajaran' => $realisasi['tahun_ajaran']]);

  if (!$cek) {
    $realisasi_id = $crud->simpan('bos_realisasi_rekapitulasi', $realisasi, true);
  } else {
    $realisasi_id = $cek[0]['id_bos_realisasi_rekapitulasi'];
  }

  $target_dir = "../../assets/uploads/";

  for ($i = 0; $i < count($_POST['kode']); $i++) {
    # code...

    $detail_realisasi = array(
      'relasi_id' => $realisasi_id,
      'no_kode' => $_POST['kode'][$i],
      'no_bukti' => $_POST['bukti'][$i],
      'uraian' => $_POST['uraian'][$i],
      'jumlah' => $_POST['jumlah'][$i],
      'tanggal' => $_POST['tanggal'][$i],
    );

    $target_file = $target_dir .  basename($_FILES["upload"]["name"][$i]);
    $temp = explode(".", $_FILES["upload"]["name"][$i]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    if (move_uploaded_file($_FILES["upload"]["tmp_name"][$i], $target_dir . $newfilename)) {
      $detail_realisasi['foto'] = $newfilename;
    }

    $crud->simpan('bos_realisasi_detail_komponen', $detail_realisasi);
  }
  header('Location:' . $url . 'tata_usaha/realisasi');
  exit;
}
$pendapatan = $crud->read_data('bos_realisasi_pendapatan');
$standar = $crud->read_data('tbl_standar_nasional');
$sub_program = $crud->read_data('bos_realisasi_komponen');
require('../../view/tata_usaha/realisasi_form.php');
