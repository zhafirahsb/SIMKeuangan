<!DOCTYPE html>
<html lang="en">

<?php require('../../../view/kepala/template/head.php'); ?>

<body class="fix-header card-no-border">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <div id="main-wrapper">

    <?php require('../../../view/kepala/template/header.php') ?>
    <?php require('../../../view/kepala/template/sidebar.php') ?>

    <div class="page-wrapper">
      <div class="container-fluid">
        <div class="row page-titles">
          <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Pengeluaran Dana Yayasan</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Dashboard</a></li>
              <li class="breadcrumb-item">Yayasan</li>
              <li class="breadcrumb-item active">Pengeluaran Dana</li>
            </ol>
          </div>
        </div>
        <div class="card">
          <div class="card-block">
            <h4 class="mb-5">
              <u>Pengeluaran Dana Yayasan</u>
            </h4>
            <table class="table table-bordered mt-5" id="example">
              <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Jumlah</th>
              </thead>
              <?php
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
      </div>
      <?php require('../../../view/kepala/template/footer.php') ?>
    </div>
  </div>
  <?php require('../../../view/kepala/template/jquery.php') ?>
</body>

</html>