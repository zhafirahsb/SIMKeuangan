<?php

session_start();
require('../../url.php'); 
require('../../proses/yayasan.php'); 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $table = 'yayasan_penerimaan_spp';
    delete($table, 'id_yayasan_penerimaan_spp', $id);
    $_SESSION['notice'] = 'Berhasil dihapus!';
    header('Location:'.$url.'view/bendahara/penerimaan_spp.php');
}
?>