<?php

session_start();
require('../../url.php'); 
require('../../proses/yayasan.php'); 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $table = 'yayasan_detail_rencana_pengeluaran';
    delete($table, 'id_yayasan_detail_rencana_pengeluaran', $id);
    $_SESSION['notice'] = 'Berhasil dihapus!';
    header('Location:'.$url.'view/bendahara/perencanaan_yayasan.php');
}
?>