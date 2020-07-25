<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    'tahun' => $_POST['tahun_ajaran'],
    'uraian' => $_POST['uraian'],
    'sub_uraian' => $_POST['sub_uraian'],
    'total' => !empty($_POST['total'][0]) ? $_POST['total'][0] : 0,
    'dibuat_tanggal' => date('Y-m-d H:i:s'),
    'id_user' => $_SESSION['login'][1]
  );


  $simpan = $crud->simpan('yayasan_rencana_pengeluaran', $data, true);

  $detail_uraian = $_POST['detail_uraian'];
  $satuan = $_POST['satuan'];
  $nilai_satuan = $_POST['jumlah_satuan'];
  $volume = $_POST['volume'];
  $nilai_volume = $_POST['jumlah_volume'];
  $jumlah = $_POST['jumlah'];

  $no = 0;
  foreach ($detail_uraian as $du) {
    $detail = array(
      'id_rencana_pengeluaran' => $simpan,
      'uraian_detail' => $detail_uraian[$no],
      'satuan' => $satuan[$no],
      'nilai_satuan' => $nilai_satuan[$no],
      'volume' => $volume[$no],
      'nilai_volume' => $nilai_volume[$no],
      'jumlah' => $jumlah[$no],
    );
    $crud->simpan('yayasan_detail_rencana_pengeluaran', $detail);
    $no++;
  }

  header('Location:' . $url . 'bendahara/yayasan/perencanaan/');
}
// $pengeluaran = $crud->read_data('yayasan_rencana_pengeluaran');
require('../../../view/bendahara/yayasan/perencanaan_dana_form.php');
