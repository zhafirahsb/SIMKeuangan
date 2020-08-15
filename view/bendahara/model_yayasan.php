<?php
session_start();
require('../../url.php');
require('../../proses/yayasan.php');
require('../_template/head.php');
require('../_template/header.php');
require('../_template/sidebar.php');
require('../../model/crud.php');
$crud = new Crud;
// $standar = $crud->read_data('tbl_standar_nasional');
// $rkas_rencana = $crud->read_data('bos_rkas_rencana');
$rencana = $crud->query("SELECT DISTINCT(tahun) FROM yayasan_detail_rencana_pengeluaran");
$realisasi = $crud->query("SELECT DISTINCT(tahun) FROM yayasan_realisasi_pengeluaran");
?>
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Model Yayasan</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item">BOS</li>
          <li class="breadcrumb-item active">Model Yayasan</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <!-- <a class="btn btn-default mb-5"></a> -->
            <?php
            if ($rencana || $realisasi) {
              foreach ($rencana as $rr) {
            ?>
                <p>Tahun Ajaran <?= $rr['tahun']; ?></p>
                <table class="table">
                  <thead class="text-center table-bordered">
                    <tr>
                      <th colspan="3">Perencanaan</th>
                      <td></td>
                      <th colspan="3">Realisasi</th>
                    </tr>
                    <tr>
                      <th>No</th>
                      <th>Pos Yayasan</th>
                      <th>Jumlah</th>
                      <td></td>
                      <th>No</th>
                      <th>Pos Yayasan</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $rencana = $crud->query("SELECT SUM(yayasan_detail_rencana_pengeluaran.jumlah) jumlah,yayasan_rencana_pengeluaran.jenis_biaya FROM yayasan_rencana_pengeluaran JOIN yayasan_detail_rencana_pengeluaran ON yayasan_detail_rencana_pengeluaran.id_rencana_pengeluaran = yayasan_rencana_pengeluaran.id_yayasan_rencana_pengeluaran WHERE yayasan_detail_rencana_pengeluaran.tahun = '" . $rr['tahun'] . "' GROUP BY yayasan_rencana_pengeluaran.jenis_biaya ORDER BY yayasan_rencana_pengeluaran.id_yayasan_rencana_pengeluaran ASC");
                    $realisasi = $crud->query("SELECT SUM(yayasan_realisasi_pengeluaran.jumlah) jumlah,yayasan_rencana_pengeluaran.jenis_biaya FROM yayasan_realisasi_pengeluaran JOIN yayasan_rencana_pengeluaran ON yayasan_rencana_pengeluaran.jenis_biaya = yayasan_realisasi_pengeluaran.jenis_biaya WHERE YEAR(yayasan_realisasi_pengeluaran.tanggal) = '" . $rr['tahun'] . "' GROUP BY yayasan_rencana_pengeluaran.jenis_biaya ORDER BY yayasan_rencana_pengeluaran.id_yayasan_rencana_pengeluaran ASC");
                    $no = 0;
                    $total1 = 0;
                    $total2 = 0;
                    foreach ($rencana as $re) {
                      $total1 += $re['jumlah'];
                      $total2 += @$realisasi[$no]['jumlah'];;
                    ?>
                      <tr>
                        <td><?= $no + 1; ?></td>
                        <td><?= $re['jenis_biaya']; ?></td>
                        <td>Rp.<?= number_format($re['jumlah'], 0, '', '.'); ?></td>
                        <td></td>
                        <td><?= @$realisasi[$no]['jenis_biaya'] ? $no + 1 : ''; ?></td>
                        <td><?= @$realisasi[$no]['jenis_biaya']; ?></td>
                        <td><?= @$realisasi[$no]['jenis_biaya'] ? 'Rp.' . number_format(@$realisasi[$no]['jumlah'], 0, '', '.') : ''; ?></td>
                      </tr>
                    <?php
                      $no++;
                    }
                    ?>
                    <tr>
                      <th>Total</th>
                      <th></th>
                      <th>Rp.<?= number_format($total1, 0, '', '.'); ?></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Rp.<?= number_format($total2, 0, '', '.'); ?></th>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>