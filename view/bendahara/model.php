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
$rkas_rencana = $crud->read_data('bos_rkas_rencana');
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
        <h3 class="text-themecolor m-b-0 m-t-0">Model Dana BOS</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item">BOS</li>
          <li class="breadcrumb-item active">Model Dana BOS</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <!-- <a class="btn btn-default mb-5"></a> -->
            <?php
            foreach ($rkas_rencana as $rr) {
            ?>
              <p>Tahun Ajaran <?= $rr['tahun']; ?></p>
              <table class="table table-bordered mt-3" id="">
                <thead>
                  <th>Kode</th>
                  <th>Nama Program</th>
                  <th>Terealisasi</th>
                  <th>Rencana</th>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $standar = $crud->query("SELECT * FROM tbl_persentase_standar_nasional JOIN tbl_standar_nasional ON tbl_standar_nasional.idsnp = tbl_persentase_standar_nasional.npsn WHERE tahun_ajaran = '" . $rr['tahun'] . "'");
                  $jumlah = 0;
                  $jumlah1 = 0;
                  $jumlah2 = 0;
                  foreach ($standar as $st) {
                    $dana_rencana = $crud->query("SELECT SUM(jumlah) jumlah FROM bos_rkas JOIN bos_rkas_detail ON bos_rkas.id_bos_rkas = bos_rkas_detail.bos_rkas WHERE bos_rkas.npsn = '" . $st['idsnp'] . "' AND bos_rkas.tahun_ajaran = '" . $rr['tahun'] . "'");

                    $dana_realisasi = $crud->query("SELECT SUM(jumlah) jumlah FROM bos_realisasi_rekapitulasi JOIN bos_realisasi_detail_komponen ON bos_realisasi_rekapitulasi.id_bos_realisasi_rekapitulasi = bos_realisasi_detail_komponen.relasi_id WHERE bos_realisasi_rekapitulasi.idsnp = '" . $st['idsnp'] . "' AND bos_realisasi_rekapitulasi.tahun_ajaran = '" . $rr['tahun'] . "'");
                    $jumlah1 += $dana_rencana[0]['jumlah'];
                    $jumlah2 += $dana_realisasi[0]['jumlah'];
                    // foreach ($pendapatan_belanja as $pb) {
                    //   if ($pb['nama_program'] === $st['nama_program']) {
                    //     $jumlah += $pb['jumlah'];
                    //   }
                    // }
                  ?>
                    <tr>
                      <td>1.<?= $no; ?></td>
                      <td><?= $st['nama_program']; ?></td>
                      <td>Rp.<?= number_format($dana_realisasi[0]['jumlah'], 0, '.', '.'); ?></td>
                      <td>Rp.<?= number_format($dana_rencana[0]['jumlah'], 0, '.', '.'); ?></td>
                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                  <tr>
                    <td colspan="2">Total Dana</td>
                    <td>Rp.<?= number_format($jumlah1, 0, '.', '.');  ?></td>
                    <td>Rp.<?= number_format($jumlah2, 0, '.', '.');  ?></td>
                  </tr>
                </tbody>
              </table>
            <?php
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