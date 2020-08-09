<?php
session_start();
require('../../../url.php');
require('../../../model/crud.php');
$crud = new Crud;
if (isset($_POST['submit'])) {
  $data = array(
    "tahun='" . $_POST['tahun'] . "'",
    "keterangan='" . $_POST['keterangan'] . "'",
    "jumlah_siswa='" . $_POST['siswa'] . "'",
    "jumlah_iuran='" . $_POST['iuran'] . "'",
  );
  $crud->update('yayasan_rencana_pendapatan', $data, 'id_yayasan_rencana_pendapatan', $_POST['id']);
  header('Location:' . $url . 'view/bendahara/perencanaan_yayasan.php?tahun=' . $_POST['tahun']);
}
