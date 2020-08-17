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
            <h3 class="text-themecolor m-b-0 m-t-0">Realisasi</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= $url; ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">BOS</li>
              <li class="breadcrumb-item active">Realisasi Dana BOS</li>
            </ol>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="card">
          <div class="card-block">
            <h4><u>Pendapatan BOS</u></h4>
            <form action="" method="post">
              <div class="row">
                <div class="col-2">
                  <div class="form-group">
                    <label>Tahun</label>
                    <select name="tahun" class="form-control">
                      <?php
                      for ($i = 2017; $i <= date('Y'); $i++) {
                      ?>
                        <option value="<?= $i; ?>"><?= $i; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label>Jumlah Dana</label>
                    <input type="number" name="jumlah_dana" class="form-control">
                  </div>
                </div>
                <div class="col-1 align-self-center">
                  <input type="submit" value="Simpan" name="submit" class="btn btn-primary">
                </div>
              </div>
            </form>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Tahun</th>
                  <th>Jumlah Dana</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($pendapatan as $pe) {
                ?>
                  <tr>
                    <td><?= $pe['tahun']; ?></td>
                    <td><?= number_format($pe['nominal'], 0, ',', '.'); ?></td>
                    <td>
                      <a href="ubah_pendapatan.php?id=<?= $pe['id_bos_realisasi_pendapatan']; ?>" class="btn btn-default">Ubah</a>
                      <a href="hapus_pendapatan.php?id=<?= $pe['id_bos_realisasi_pendapatan']; ?>&tahun=<?= $pe['tahun']; ?>" class="btn btn-default" onclick="return confirm('Akan menghapus data ini ?')">Hapus</a>
                    </td>
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
                <form action="" method="post">
                  <div class="row mb-5">
                    <div class="col-3 align-self-center">
                      <select name="tahun_ajaran" class="form-control" id="" required>
                        <option value="">Pilih Tahun</option>
                        <?php
                        for ($a = 2017; $a <= date('Y'); $a++) {
                        ?>
                          <option value="<?= $a; ?>"><?= $a; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-1 align-self-center">
                      <input type="submit" value="Submit" name="data" class="btn btn-primary">
                    </div>
                    <div class="col-2 align-self-center">
                      <a href="tambah_data.php" class="btn btn-primary">Tambah Data</a>
                    </div>
                  </div>
                </form>
                <?php
                $no = 0;
                $jumlah = 0;
                // foreach ($pendapatan as $re) {
                if (@count($pendapatan1) > 0) {
                ?>
                  <p>Tahun Ajaran <?= $pendapatan1[0]['tahun']; ?></p>
                  <table class="table table-bordered mt-3">
                    <thead>
                      <th>No</th>
                      <th>Nama Program</th>
                      <th>Dana Digunakan</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($standar as $s) {
                        $dana = $crud->query("SELECT SUM(jumlah) jumlah FROM `bos_realisasi_rekapitulasi` JOIN bos_realisasi_detail_komponen ON bos_realisasi_detail_komponen.relasi_id = bos_realisasi_rekapitulasi.id_bos_realisasi_rekapitulasi WHERE bos_realisasi_rekapitulasi.idsnp = '" . $s['idsnp'] . "' AND tahun_ajaran = '" . $pendapatan1[0]['tahun'] . "'")
                      ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $s['nama_program']; ?></td>
                          <td><?= number_format($dana[0]['jumlah'], 0, ',', '.'); ?></td>
                          <td>
                            <a href="detail.php?tahun=<?= $pendapatan1[0]['tahun']; ?>&standar=<?= $s['idsnp']; ?>" class="btn btn-default">Detail</a>
                          </td>
                        </tr>
                      <?php
                        $no++;
                        $jumlah += $dana[0]['jumlah'];
                      }
                      ?>
                      <th colspan="2">Total Dana Digunakan</th>
                      <td><?= number_format($jumlah, 0, ',', '.'); ?></td>
                    </tbody>
                  </table>
                <?php
                } else {
                ?>
                  <p>Tidak ada data</p>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>

      </div>
      <?php require('template/footer.php') ?>

      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <?php require('template/jquery.php') ?>

</body>

</html>