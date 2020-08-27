<!DOCTYPE html>
<html lang="en">
<?php require('template/head.php') ?>

<body class="fix-header card-no-border">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php require('template/header.php') ?>

    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php require('template/sidebar.php') ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
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
            <h3 class="text-themecolor m-b-0 m-t-0">Perencaaan Dana BOS</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url; ?>">Home</a></li>
              <li class="breadcrumb-item">BOS</li>
              <li class="breadcrumb-item active">Perencaaan Dana BOS</li>
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
                        <td>Rp.<?= number_format($jumlah2, 0, '.', '.');  ?></td>
                        <td>Rp.<?= number_format($jumlah1, 0, '.', '.');  ?></td>
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
      <?php require('template/footer.php') ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>

  <?php require('template/jquery.php') ?>

</body>

</html>