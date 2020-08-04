<?php 
session_start();
require('../../url.php'); 
require('../../proses/yayasan.php'); 
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
        <h3 class="text-themecolor m-b-0 m-t-0">Perencanaan Dana BOS</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item active">Perencanaan BOS</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->
    <div class="card">
          <div class="card-block">
            <h4><u>Perencanaan Dana Yayasan (Pendapatan)</u></h4>
            
            <table class="table table-bordered">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Tahun</th>
                  <th>Keterangan</th>
                  <th colspan="7">Uraian</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $pendapatan = get_rencana_pendapatan_yys();
                $no = 0;
                foreach ($pendapatan as $p) {
                ?>
                  <tr>
                    <td><?= $no + 1; ?></td>
                    <td><?= $p['tahun']; ?></td>
                    <td><?= $p['keterangan']; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? $p['jumlah_siswa'] : ''; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? 'sis' : ''; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? 'x' : ''; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? '12' : ''; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? 'x' : ''; ?></td>
                    <td><?= $p['jumlah_siswa'] > 0 ? 'bln' : ''; ?></td>
                    <td>Rp. <?= number_format($p['jumlah_iuran'], 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($p['jumlah_siswa'] > 0 ? $p['jumlah_siswa'] * $p['jumlah_iuran'] * 12 : $p['jumlah_iuran'], 0, ',', '.'); ?></td>
                    <!-- <td>Rp. <?= number_format($p['jumlah_iuran'], 0, ',', '.'); ?></td> -->
                  </tr>
                <?php
                  $no++;
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
                    <tr class="text-center">
                      <th>Tahun</th>
                      <th>Uraian</th>
                      <th colspan="2" width="20%">Satuan</th>
                      <th colspan="2" width="20%">Volume</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <?php
                  $pengeluaran = get_rencana_pengeluaran_yys();
                  foreach ($pengeluaran as $pe) {
                  ?>
                    <tr>
                      <td><?= $pe['tahun']; ?></td>
                      <td><?= $pe['uraian']; ?></td>
                      <td><?= $pe['nilai_satuan'] > 0 ? $pe['nilai_satuan'] : '-'; ?></td>
                      <td><?= $pe['satuan']; ?></td>
                      <td><?= $pe['nilai_volume'] > 0 ? $pe['nilai_volume'] : '-'; ?></td>
                      <td><?= $pe['volume']; ?></td>
                      <td><?= $pe['jumlah'] > 0 ? 'Rp .' . number_format($pe['jumlah'], 0, ',', '.') : '-'; ?></td>
                      <td>Rp. <?= number_format($pe['total'], 0, '.', '.'); ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                  <tbody>
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
