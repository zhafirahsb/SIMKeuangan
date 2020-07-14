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
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
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
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-block">
                <a href="tambah_data.php" class="btn btn-primary mb-5">Tambah Data</a>
                <table class="table table-bordered mt-3" id="example">
                  <thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Kode</th>
                    <th>No Bukti</th>
                    <th>Uraian</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php
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
                        <td><?= $re['status']; ?></td>
                        <td>
                          <a href="ubah_data.php?realisasi=<?= $re['id_relasi'] ?>&detail=<?= $re['id'] ?>" class="btn btn-default">Ubah</a>
                          <a href="hapus_data.php?realisasi=<?= $re['id_relasi'] ?>&detail=<?= $re['id'] ?>" class="btn btn-default">Hapus</a>
                        </td>
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