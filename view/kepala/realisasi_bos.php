<?php 
session_start();
require('../../url.php'); 
require('../../proses/bos.php'); 
require('../_template/head.php'); 
require('../_template/header.php');
require('../_template/sidebar.php');
?>
<div class="page-wrapper">
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="row page-titles">
      <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Realisasi Dana BOS</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item active">Realisasi BOS</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->
    <div class="card">
      <div class="card-block">
        <h4><u>Pendapatan BOS</u></h4>
        <table class="table">
          <thead>
            <tr>
              <th>Tahun</th>
              <th>Jumlah Dana</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $pendapatan = get_realisasi_pendapatan();
            foreach ($pendapatan as $pe) {
            ?>
              <tr>
                <td><?= $pe['tahun']; ?></td>
                <td><?= $pe['nominal']; ?></td>
              </tr>
            <?php
            }

            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <table class="table table-bordered mt-3" id="example">
              <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>No Kode</th>
                <th>No Bukti</th>
                <th>Uraian</th>
                <th>Jumlah</th>
              </thead>
              <tbody>
                <?php
                $realisasi = get_realisasi_pengeluaran_bos();
                $no = 0;
                foreach ($realisasi as $re) {
                ?>
                  <tr>
                    <td><?= $no + 1; ?></td>
                    <td><?= date('d/m/Y', strtotime($re['tanggal'])); ?></td>
                    <td><?= $re['no_kode']; ?></td>
                    <td><?= $re['no_bukti']; ?></td>
                    <td><?= $re['uraian']; ?></td>
                    <td>Rp.<?= number_format($re['jumlah'], 0, ',', '.'); ?></td>
                  </tr>
                <?php
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End PAge Content -->
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>
