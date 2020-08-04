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
            <h4><u>Pengeluaran Dana Yayasan</u></h4>
            <table class="table table-bordered mt-3" id="example">
              <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Jumlah</th>
              </thead>
              <?php
              $pengeluaran = get_pengeluaran_yys();
              $no = 1;
              foreach ($pengeluaran as $sp) {
              ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= date('d-m-Y', strtotime($sp['tanggal'])); ?></td>
                  <td><?= $sp['uraian']; ?></td>
                  <td>Rp. <?= number_format($sp['jumlah'], 0, ',', '.'); ?></td>
                </tr>
              <?php
                $no++;
              }
              ?>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
    <!-- End PAge Content -->
  </div>
  <!-- End Container fluid  -->
  <!-- footer -->
  <?php require('../_template/footer.php') ?>
</div>
<?php require('../_template/jquery.php') ?>
