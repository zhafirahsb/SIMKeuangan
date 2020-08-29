<?php
session_start();
require('../../url.php');
require('../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $tipe = $_POST['tipe'];
  if ($tipe == 'belanja') {
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $nama_program = $_POST['nama_program'];
    $sub_program = $_POST['sub_program'];

    if (empty($tahun_ajaran) || empty($nama_program) || empty($sub_program)) {
      $_SESSION['notice'] = 'Data yang Anda masukan salah !';
      header('Location:' . $url . 'tata_usaha/perencanaan_bos/tambah.php');
      exit;
    }

    $sub = $crud->query("SELECT COUNT(*) as jumlah FROM bos_rkas WHERE tahun_ajaran = '" . $tahun_ajaran . "'")[0]['jumlah'] + 1;

    if ($sub < 10) {
      $no_sub = '0' . $nama_program . '0' . $sub;
    } else {
      $no_sub = '0' . $nama_program . $sub;
    }

    $data = array(
      'tahun_ajaran'   => $tahun_ajaran,
      'npsn'           => $nama_program,
      'sub_program'    => $sub_program,
      'no_kode'        => $no_sub,
      'tipe'           => $tipe,
      'id_user'        => $_SESSION['login'][1],
      'dibuat_tanggal' => date('Y-m-d H:i:s'),
    );

    $no_kode = $_POST['no_kode'];
    $uraian = $_POST['uraian'];
    $jumlah = $_POST['jumlah'];

    $no = 0;
    foreach ($uraian as $u) {
      if (empty($uraian[$no]) || empty($jumlah[$no]) || !is_numeric($jumlah[$no])) {
        $_SESSION['notice'] = 'Data yang Anda masukan salah !';
        header('Location:' . $url . 'tata_usaha/perencanaan_bos/tambah.php');
        exit;
      }
      $no++;
    }

    $id = $crud->simpan('bos_rkas', $data, true);

    $no = 0;
    $j_uraian = $crud->query("SELECT COUNT(*) as jumlah FROM bos_rkas_detail JOIN bos_rkas WHERE tahun_ajaran = '" . $tahun_ajaran . "'")[0]['jumlah'] + 1;

    $detail = array();
    foreach ($uraian as $u) {
      if ($j_uraian < 10) {
        $no_uraian = $no_sub . '0' . $j_uraian;
      } else {
        $no_uraian = $no_sub . $j_uraian;
      }

      $detail = array(
        'bos_rkas' => $id,
        'no_kode' => $no_uraian,
        'uraian' => $uraian[$no],
        'jumlah' => $jumlah[$no],
      );
      $crud->simpan('bos_rkas_detail', $detail);
      $no++;
      $j_uraian += $no;
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
  header('Location:' . $url . 'tata_usaha/perencanaan_bos');
} else {
  $standar = $crud->read_data('tbl_standar_nasional');
  $dana = $crud->read_data('bos_rkas_rencana');
  require('../../view/tata_usaha/perencanaan_bos_form.php');
}
