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
        <h3 class="text-themecolor m-b-0 m-t-0">Perencanaan Dana Yayasan</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
          <li class="breadcrumb-item active">Perencanaan Yayasan</li>
        </ol>
      </div>
    </div>
    <!-- Start Page Content -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <p>Rencana Pemasukan</p>
            <div class="row">
              <div class="col-2 mt-3">
                <p>Saldo Tahun Lalu</p>
              </div>
              <div class="col-3 align-self-center">
                <input type="number" disabled class="form-control" name="" id="">
              </div>
              <div class="col-3 mt-3">
                <label for="">Total Rencana Pemasukan</label>
              </div>
              <div class="col-4 align-self-center">
                <input type="number" disabled class="form-control" name="" id="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <!-- <a class="btn btn-default mb-5"></a> -->
            <p>Rencana Pengeluaran / Belanja</p>
            <table class="table table-bordered mt-3" id="">
              <thead>
                <th>Kode</th>
                <th>Nama Program</th>
                <th>Persentase</th>
                <th>Jumlah Dana</th>
              </thead>
              <tbody>
                <?php
                $standar = get_standar_nasional();
                $pendapatan_belanja = get_pendapatan_belanja();
                $no = 1;
                foreach ($standar as $st) {
                  $jumlah = 0;
                  foreach ($pendapatan_belanja as $pb) {
                    if ($pb['nama_program'] === $st['nama_program']) {
                      $jumlah += $pb['jumlah'];
                    }
                  }
                ?>
                  <tr>
                    <td>1.<?= $no; ?></td>
                    <td><?= $st['nama_program']; ?></td>
                    <td></td>
                    <td>Rp.<?= number_format($jumlah, 0, '.', '.'); ?></td>
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
